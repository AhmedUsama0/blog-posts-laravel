<x-app-layout>
    <div class="container pt-3 pb-3">
        <div class="d-flex flex-column gap-3 col-12 col-sm-8 mx-auto">
            @session('message')
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endsession
            <div class="write-post mx-auto w-100 bg-light p-3 rounded-3">
                <div class="d-flex align-items-center gap-2">
                    <img src={{ asset('assets/' . Auth::user()->image->image) }} alt="user" class="rounded-circle"
                        style="width:50px;height:50px">
                    <form action="{{ route('post.store') }}" method="POST" class="w-100" id="add-post-form">
                        @csrf
                        <textarea class="form-control" name="post" id="post" cols="30" style="resize:none;background:none"
                            placeholder="{{ "What's on your mind, " . Auth::user()->name . '?' }}"></textarea>
                    </form>
                </div>
            </div>
            @foreach ($posts as $post)
                <div class="border border-light-subtle border-5 rounded-2 p-2">
                    <div class="user-info d-flex align-items-center gap-2 mb-2">
                        <img src={{ asset('assets/' . $post->user->image->image) }} alt="user"
                            class="rounded-circle" style="width:50px;height:50px">
                        <h5 class="text-capitalize">{{ $post->user->name }}</h5>
                        <p class="created-at ms-auto mr-2 fs-6 text-secondary">
                            {{ \Carbon\Carbon::parse($post->created_at)->format("F j, Y \a\\t g:i A") }}</p>
                    </div>
                    <div class="post-content">{{ $post->post }}</div>
                    <form action="{{ route('comment.store', $post->id) }}" method="POST" class="mt-3"
                        id="add-comment-form">
                        @csrf
                        <textarea name="comment" id="comment" cols="30" rows="5" class="form-control" placeholder="Write Comment"
                            style="resize:none;background:none;"></textarea>
                    </form>
                    <div class="comments mt-3 overflow-auto" style="max-height: 300px">
                        @foreach ($post->comments as $comment)
                            <div
                                class="comment-container mb-3 bg-light-subtle p-3 pt-2 pb-5 rounded-3 position-relative">
                                <div class="comment-content d-flex gap-3">
                                    <img src={{ asset('assets/' . $comment->user->image->image) }} alt="user"
                                        style="width:50px;height:50px;" class="align-self-start rounded-circle">
                                    <p class="comment pb-2 pt-2">{{ $comment->comment }}</p>
                                </div>
                                <p class="position-absolute end-0 text-secondary fs-6 px-3">
                                    {{ \Carbon\Carbon::parse($comment->created_at)->format("F j, Y \a\\t g:i A") }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>

<script>
    $("document").ready(function() {
        $("#comment").keypress(function(event) {
            if (event.keyCode === 13 && !event.shiftKey) {
                event.preventDefault();
                $("#add-comment-form").submit();
            }
        });

        $("#post").keypress(function(event) {
            if (event.keyCode === 13 && !event.shiftKey) {
                event.preventDefault();
                $("#add-post-form").submit();
            }
        })
    })
</script>
