<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(Session::has('success'))
                        <div class="col-6 alert alert-success justify-content-center d-flex">
                            {{Session::get('success')}}
                        </div>
                    @endif
                    @if(isset($posts) && $posts -> count() > 0)
                        @foreach($posts as $post)
                            <div class="card-body post-count">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                <h1 class="title" STYLE="font-size: 20px"> {{$post -> title}} - @if(Auth::id() == $post -> user -> id)   المالك @endif</h1>
                                <br>
                                <p class="content">{{$post -> content}}</p>


                                    <br><br>
                                    <h1>Comments</h1>
                                    <br>
                                    @if($post->comments->count() > 0)
                                        @foreach($post->comments as $_comment)
                                            <p>{{$_comment -> comment}}</p>
                                            <br>
                                        @endforeach
                                        @endif
                                <form method="POST" action="{{route('comment.save')}}" enctype="multipart/form-data">
                                    @csrf

                                    <input type="hidden" name="post_id" value="{{$post -> id}}">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="post_content">
                                        @error('name_ar')
                                        <small class="form-text text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <br>

                                    @if(Auth::id() != $post -> user -> id)
                                        <button type="submit" class="btn btn-primary">أضافه ردك</button>
                                    @endif
                                </form>


                            </div>
                        @endforeach
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
