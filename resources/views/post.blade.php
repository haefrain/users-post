@extends('layout')

@section('body')
<a class="btn btn-secondary" href="{{url('/')}}">Go back</a>

<table class="table table-hover">
    <thead>
        <th>Post</th>
        <th>Comments</th>
    </thead>
    <tbody>
        @foreach($posts AS $post)
            <tr>
                <td>{{$post->title}}</td>
                <td>
                    @if(count($post->comments) > 0)
                        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#tableComments-{{$post->id}}" aria-expanded="false" aria-controls="tableComments-{{$post->id}}">
                            Show comments
                        </button>
                        <div class="collapse" id="tableComments-{{$post->id}}">
                            <div class="card card-body">
                                <ul>
                                    @foreach($post->comments AS $comment)
                                            <li>{{$comment->comment}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @else
                        <span>Without comments</span>
                    @endif

                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
