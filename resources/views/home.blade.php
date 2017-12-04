@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                     
                    @foreach($chatrooms as $chatroom)

                       <form action="{{Auth::user()->chatrooms->contains($chatroom)?
                           route('leave_chatroom'):route('join_chatroom') }}"  method="POST">

                              {{ csrf_field() }}
                              <input type="hidden" name="chatroom_id" value="{{ $chatroom->id }}">
                            
                            

                        <div class="form-group">
                            @if(!Auth::user()->chatrooms->contains($chatroom))
                            <label for="name" class="col-md-4 control-label">{{ $chatroom->name }}</label>
                            @else
                                <a href="/chatroom/{{ $chatroom->id }}"><label for="name" class="col-md-4 control-label">{{ $chatroom->name }}</label></a>
                            @endif

                            <div class="col-md-6">
                               <button class="btn btn-default" type="submit">{{ Auth::user()->chatrooms->contains($chatroom)? 'Leave' : 'Join' }}
                            </button>



                            </div>
                        </div>

                        </form>

                    @endforeach
                

                </div>

                @if(Auth::user()->role->name == 'Admin')

                            <form method="POST" action="/create_system_message">
                        <div class="panel panel-default text-left">
                           <div class="panel-body">
                              {{ csrf_field() }}
                              <h4>Send System Message</h4>
                              <div class="form-group">
                                 <textarea class="col-sm-12" style="margin: 1px" name="sys_message" rows="1" ></textarea>
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
                                
                                   
                 @endif
            </div>
        </div>
    </div>
</div>
@endsection

