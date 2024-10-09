<?php
use Illuminate\Support\Facades\Auth;
if (Auth::check()) {
    $id = Auth::id();
    echo "Hello Aristos with id $id";
} else {
    echo "Hello Guest";
}
?>
