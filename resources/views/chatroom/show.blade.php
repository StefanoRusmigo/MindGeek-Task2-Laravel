@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $chatroom->name }}</div>

                <div class="panel-body">
                    <form method="POST" action="/create_message">
                        <div class="panel panel-default text-left">
                           <div class="panel-body">
                              {{ csrf_field() }}
                              <input type="hidden" name="chatroom_id" value="{{ $chatroom->id }}">
                              <div class="form-group">
                                 <textarea class="col-sm-12" style="margin: 1px" name="message" rows="1"  required></textarea>
                              </div>

                              <div class="form-group">
                                    <button type="submit" class="btn btn-primary" 
                                            style="float: left;">
                                            Submit
                                    </button>
                              </div>
                            </div>
                         </div>

                    </form>
                    @foreach($chatroom->allMessages() as $message)

                    <div class="row">
                  <div class="col-sm-3">
                    <div class="well">
                      
                        
                      <p>
                        {{ $message->created_at->toFormattedDateString() }}    
                        {{ $message->created_at->toTimeString() }} 
                      </p>
                    </div>
                  </div>
                  <div class="col-sm-9">
                    <div class="well" style="text-align: left;">
                      @if($message->type->name == 'Standard')
                      <h5>{{ $message->user->name }}:</h5>
                      {{  $message->content }}
                      @else
                      <h5 style="color: red;">SYSTEM MESSAGE:</h5>
           
                          {{  $message->content }}
                        
                      @endif
                    </div>
                  </div>
                </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection