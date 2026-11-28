<?php

it('redirects the home page to the task list', function () {
    $response = $this->get('/');

    $response->assertRedirect(route('tasks.index'));
});
