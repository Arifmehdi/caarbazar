{{-- <div class="media">
    <a class="pull-left" href="#">
        <img src="//www.gravatar.com/avatar/{{ md5($message->user->email) }} ?s=64"
             alt="{{ $message->user->name }}" class="img-circle">
    </a>
    <div class="media-body">
        <h5 class="media-heading">{{ $message->user->name }}</h5>
        <p>{{ $message->body }}</p>
        <div class="text-muted">
            <small>Posted {{ $message->created_at->diffForHumans() }}</small>
        </div>
    </div>
</div> --}}

<div class="media mb-4 p-3 border rounded shadow-sm">
    <a class="pull-left me-3" href="#">
        <img src="//www.gravatar.com/avatar/{{ md5($message->user->email) }}?s=64"
             alt="{{ $message->user->name }}" class="img-circle border">
    </a>
    <div class="media-body">
        <h5 class="media-heading fw-bold">{{ $message->user->name }}</h5>
        <p class="mb-1">{{ $message->body }}</p>
        <div class="text-muted">
            <small>Posted {{ $message->created_at->diffForHumans() }}</small>
        </div>
    </div>
</div>

