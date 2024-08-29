<?php

use Illuminate\Support\Facades\Schedule;

Schedule::command('restaurantes:update-list')->daily();
