@section('title', "Scholar Link")
@section('page_title', $viewData['title'])
@include('partials.header')
@include('partials.menu')
@guest
@include('cover')
@else
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">@yield('page_title')</h1>
    </div>

    <div class="container" id="app">
        
        <div class="card mt-4">
            <div class="card-header p-2">
                <div><p>user connected: @{{ name }}</p></div>
            </div>
            <div v-if="connected === true" class="card-body">
                <div class="col-12 bg-light pt-2 pb-2 mt-3">
                    <p class="p-0 m-0 ps-2 pe-2" v-for="(message, index) in incomingMessages">
                        (@{{ message.time }}) <b>@{{ message.name }}</b>:
                        @{{ message.message }}
                    </p>
                </div>
                <h4 class="mt-4">Message</h4>
                <form action="">
                    <div class="row mt-2">
                        <div class="col-12 text-white" v-show="formError === true">
                            <div class="bg-danger p-2 mb-2">
                                <p class="p-0 m-0">
                                    <b>Error:</b> Invalid message.
                                </p>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <textarea v-model="message" name="" id="" rows="3" placeholder="Your Message ..." class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row text-rigth mt-2">
                        <div class="col-lg-10">

                        </div>
                        <div class="col-lg-2">
                            <button v-on:click="sendMessage()" type="button" class="btn btn-small btn-primary w-100">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        new Vue({
            "el": "#app",
            "data": {
                connected: false,
                pusher: null,
                app: null,
                apps: {!! json_encode($viewData['apps']) !!},
                logChannel: "{{ $viewData['logChannel'] }}",
                authEndpoint: "{{  $viewData['authEndpoint'] }}",
                cluster: "{{ $viewData['cluster'] }}",
                port: "{{ $viewData['port'] }}",
                host: "{{ $viewData['host'] }}",
                state: null,
                name: "{{ $viewData['user']->name }}",
                formError: false,
                incomingMessages: [
                ],
                message: null
            },
            mounted(){
                this.app = this.apps[0] || null;
                this.connect();
            },
            methods: {
                connect(){
                    this.pusher = new Pusher("staging", {
                        cluster: this.cluster,
                        wsHost: this.host,
                        wsPort: this.port,
                        wssPort: this.port,
                        wsPath: this.app.path,
                        disableStats: true,
                        authEndpoint: this.authEndpoint,
                        forceTLS: false,
                        auth: {
                            headers: {
                                "X-CSRF-Token" : "{{ csrf_token() }}",
                                "X-App-ID": this.app.id
                            }
                        },
                        enabledTransports:["ws", "flash"]
                    });
                    this.pusher.connection.bind('state_change', states => {
                        this.state = states.current
                    });
                    this.pusher.connection.bind('connected', () => {
                        this.connected = true;
                    });
                    this.pusher.connection.bind('disconnected', () => {
                        this.connected = false;
                    });
                    this.pusher.connection.bind('error', event => {
                        this.formError = true;
                    });
                    this.suscribeToAllChannels();
                },
                suscribeToAllChannels(){
                    [
                        "api-message"
                    ].forEach(channelName => this.suscribeToChannel(channelName));
                },
                suscribeToChannel(channelName){
                    // alert("ANOTHER");
                    let inst = this;
                    this.pusher.subscribe(this.logChannel + channelName)
                        .bind("log-message", (data)=>{
                            // console.log("Received data:", data);
                            if(data.type === "api-message"){
                                if(data.details.includes("SendMessageEvent")){
                                    let messageData = JSON.parse(data.data);
                                    let utcDate = new Date(messageData.time);
                                    messageData.time = utcDate.toLocaleString();
                                    inst.incomingMessages.push(messageData);
                                }
                            }
                        });
                },
                disconnect(){
                    this.connected = false;
                },
                sendMessage(){
                    this.formError = false;
                    if (this.message === "" || this.message === null) 
                    {
                        this.formError = true;
                    } 
                    else 
                    {
                        $.post("/chat/send", {
                            _token: '{{ csrf_token() }}',
                            message: this.message,
                            name: this.name
                            }).fail(() => {
                            alert("Error sending event.");
                        });
                        this.message = null;
                        console.log(this.incomingMessages[0]);
                    }
                }
            }
        });
    </script>

    
</main>
</div>
</div>
@endguest
@include('partials.footer')