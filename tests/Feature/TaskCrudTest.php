<?php
namespace Tests\Feature;
use App\Models\User;
use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
class TaskCrudTest extends TestCase {
 use RefreshDatabase;
 private function createUser(string $email):User {
  return User::create(['name'=>'Test Student','email'=>$email,'password'=>'supersecurepass']);
 }
 public function test_guest_cannot_access_tasks():void {$this->get('/tasks')->assertRedirect('/login');}
 public function test_user_can_register_login_and_manage_own_tasks():void {
  $this->post('/register',['name'=>'Test Student','email'=>'one@example.com','password'=>'password123','password_confirmation'=>'password123'])->assertRedirect(route('tasks.index'));
  $this->assertAuthenticated();
  $this->post('/tasks',['title'=>'Write Laravel report','description'=>'CRUD lab'])->assertRedirect(route('tasks.index'));
  $task=Task::firstOrFail();
  $this->assertEquals(auth()->id(),$task->user_id);
  $this->get('/tasks')->assertSee('Write Laravel report');
  $this->put('/tasks/'.$task->id,['title'=>'Updated report','description'=>'Breeze lab','is_completed'=>'1'])->assertRedirect(route('tasks.index'));
  $this->assertDatabaseHas('tasks',['id'=>$task->id,'title'=>'Updated report','is_completed'=>1]);
  $this->delete('/tasks/'.$task->id)->assertRedirect(route('tasks.index'));
  $this->assertDatabaseMissing('tasks',['id'=>$task->id]);
 }
 public function test_user_cannot_edit_or_delete_another_users_tasks():void {
  $owner=$this->createUser('owner@example.com');
  $intruder=$this->createUser('other@example.com');
  $task=$owner->tasks()->create(['title'=>'Owner private task']);
  $this->actingAs($intruder)->get('/tasks/'.$task->id.'/edit')->assertForbidden();
  $this->actingAs($intruder)->put('/tasks/'.$task->id,['title'=>'Changed'])->assertForbidden();
  $this->actingAs($intruder)->delete('/tasks/'.$task->id)->assertForbidden();
  $this->get('/tasks')->assertDontSee('Owner private task');
 }
 public function test_title_is_required():void {
  $this->actingAs($this->createUser('validation@example.com'))->post('/tasks',['title'=>''])->assertSessionHasErrors('title');
 }
}
