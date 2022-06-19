@extends('layouts.main')
@section('title', 'Чатбот')
@section('content')
    <style>
        .chat {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .chat li {
            margin-bottom: 10px;
            padding-bottom: 5px;
            border-bottom: 1px dotted #B3A9A9;
        }

        .chat li .chat-body p {
            margin: 0;
            color: #777777;
        }

        .panel-body {
            overflow-y: scroll;
            height: 400px;
        }

        /*::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
            background-color: #F5F5F5;
        }*/

        ::-webkit-scrollbar {
            width: 12px;
            background-color: #F5F5F5;
        }

        ::-webkit-scrollbar-thumb {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
            background-color: #555;
        }

        .chat-root {
            height: calc(100vh - 60px - 140px);
            margin-top: 30px;
        }

        .chat-title {
            text-align: center;
            width: 100%;
            margin-bottom: 50px;
        }

        .chat-container {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 50px;
        }

        #root {
            min-width: 600px;
            max-width: 600px;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            border-radius: 10px;
        }

        #btn-input, #btn-chat {
            height: 40px;
        }

        #btn-input {
            border-radius: 0 0 0 10px;
        }

        #btn-chat {
            border-radius: 0 0 10px 0;
        }
        .panel-default{
            width: 100%;
        }
        .chat li.left .chat-body {
            margin-left: 0px !important;
        }
    </style>
    {{--    <div class="container">--}}
    {{--        <div class="row">--}}
    {{--            <div class="col-md-8 col-md-offset-2">--}}
    {{--                <div class="panel panel-default">--}}
    {{--                    <div class="panel-heading">Chats</div>--}}

    {{--                    <div class="panel-body">--}}
    {{--                        <chat-messages :messages="messages"></chat-messages>--}}
    {{--                    </div>--}}
    {{--                    <div class="panel-footer">--}}
    {{--                        <chat-form--}}
    {{--                            v-on:messagesent="addMessage"--}}
    {{--                            :user="{{ Auth::user() }}"--}}
    {{--                        ></chat-form>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    <div  class="flex-center position-ref full-height chat-root">
        <div class="chat-title font-italic"><h1>Нейронный Сократ</h1></div>
        <div class=" chat-container">
            <div class="row" id="root" >
                <div class="panel panel-default">
                    <chat-messages :messages="messages"></chat-messages>
                    <div class="panel-footer">
                        <chat-form
                            v-on:messagesent="addMessage"
                            :user="{{ Auth::user() }}"
                        ></chat-form>

                    </div>

                </div>




                <script src="{{ asset('js/app.js') }}" ></script>

                {{--                    <script>--}}
                {{--                        import ChatForm from "../../js/components/ChatForm";--}}
                {{--                        export default {--}}
                {{--                            components: {ChatForm}--}}
                {{--                        }--}}
                {{--                    </script>--}}


            </div>
@endsection('content')

