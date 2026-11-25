<?php

use App\Models\User;

test('a user can create a task', function () {
    // Arrange
    $user = User::factory()->create();

    // Act
    $response = $this->actingAs($user)->post(route('tasks.store'), [
        'title' => 'Write tests',
        'description' => 'Learn feature testing',
        'due_date' => '2026-12-01',
    ]);

    // 1. the app redirected to the task list
    $response->assertRedirect(route('tasks.index'));

    // 2. the task exists in the database, owned by this user
    $this->assertDatabaseHas('tasks', [
        'title' => 'Write tests',
        'user_id' => $user->id,
    ]);
});

test('a task cannot be created without a title', function () {
    // Arrange
    $user = User::factory()->create();

    // Act: send the form with an empty title
    $response = $this->actingAs($user)->post(route('tasks.store'), [
        'title' => '',
        'description' => 'No title here',
    ]);

    // 1. validation failed for the title field
    $response->assertSessionHasErrors('title');

    // 2. no task was saved
    $this->assertDatabaseCount('tasks', 0);
});

test('a user sees only their own tasks', function () {
    // Arrange: two users, one task each
    $user = User::factory()->create();
    $otherUser = User::factory()->create();

    $user->tasks()->create(['title' => 'My own task']);
    $otherUser->tasks()->create(['title' => 'Someone elses task']);

    // Act: the first user opens the task list
    $response = $this->actingAs($user)->get(route('tasks.index'));

    // Assert
    // 1. the page loads successfully
    $response->assertStatus(200);
    // 2. the user's own task appears on the page
    $response->assertSee('My own task');
    // 3. the other user's task does NOT appear
    $response->assertDontSee('Someone elses task');
});
