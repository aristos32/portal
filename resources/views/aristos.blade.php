@if (false)
    I have one record!
@else
    I don't have any records!
@endif
<?php
use Illuminate\Support\Facades\Auth;
if (Auth::check()) {
    $id = Auth::id();
    echo "Hello Aristos with id $id";
} else {
    echo "Hello Guest";
}
?>
