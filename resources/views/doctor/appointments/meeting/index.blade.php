@extends('doctor.layouts.master')
@section('title','Randevu')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
      </div>
    </div>

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card card-primary">
   <script>
      const ROOM_ID = "{{ $appointment->room_name }}"
   </script>
   <script defer src="https://unpkg.com/peerjs@1.3.1/dist/peerjs.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
   <script src="{{asset('/')}}socket.io/socket.io.js" defer></script>
   <link rel="stylesheet" href="{{asset('/')}}meeting/style.css">
   <script src="{{asset('/')}}meeting/script.js" defer></script>
   <style>
      #video-grid{
         display: flex;
         justify-content: center;
         flex-wrap: wrap;
      }
      video{
         height: 300px;
         width: 400px;
         object-fit: cover;
         padding: 8px;
      }
   </style>
   <div class="main">
      <div class="main__left">
         <div class="main__videos">
            <div id="video-grid">
      
            </div>
         </div>
         <div class="main__controls">
            <div class="main__controls__block">
               <div onclick="muteUnmute()" class="main__controls__button main__mute_button">
                  <i class="fas fa-microphone"></i>
                  <span>Mute</span>
               </div>
               <div onclick="playStop()" class="main__controls__button main__video_button" >
                  <i class="fas fa-video"></i>
                  <span>Stop Video</span>
               </div>
            </div>
            <div class="main__controls__block">
            </div>
            <div class="main__controls__block">
               <div class="main__controls__button">
                  <span class="leave_meeting">Leave Meeting</span>
               </div>
            </div>
         </div>
      </div>
      <div class="main__right">
         <div class="main__header">
            <h6>Chat</h6>
         </div>
         <div class="main__chat_window">
            <ul class="messages">
               
            </ul>

         </div>
         <div class="main__message_container">
            <input id="chat_message" type="text" placeholder="Type message here...">
         </div>
      </div>
   </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
