<div class="w-full overflow-hidden">

    <div class="border-b flex flex-col oerflow-y-scroll grow h-full">

    {{-- header --}}
    <header class="w-full sticky inset-x-0 flex pb-[5px] pt-[5px] top-0 z-10 bg-white border-b">
        <div class="flex w-full items-center px-2 lg:px-4 gap-2 md:gap-5">
            <a class="shrink-0 lg:hidden" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
                  </svg>
            </a>

            {{-- avatar --}}
            <div class="shrink-0">
                <x-avatar src="{{$data_room['image_url']}}"/>
            </div>

            <h6 class="font-bold truncate">
                {{$data_room['name']}}
            </h6>
        </div>
    </header>

    {{-- body --}}
    <main class="flex flex-col gap-3 p-2.5 overflow-y-auto flex-grow overcsroll-contain overflow-x-hidden w-full my-auto">
        
        @foreach($comments as $comment)
        
        <div @class(['max-w-[85%] md:max-w-[78%] flex w-auto gap-2 relative mt-2',
        'ml-auto'=>$comment['sender'] === auth()->user()->email ])>

            {{-- avatar --}}
            <div @class(['shrink-0'])>
                <x-avatar />
            </div>

            {{-- message body --}}

            <div @class(['flex flex-wrap text-[15px] rounded-xl p-2.5 flex flex-col text-black bg-[#f6f6f8fb]',
                        'rounded-bl-none norder norder-gray-200/40' =>!($comment['sender'] === auth()->user()->email),
                        'rounded-br-none bg-blue-500/80 text-white' =>$comment['sender'] === auth()->user()->email])>

                <h6 class="font-bold truncate">
                    {{$comment['sender']}}
                </h6>
                <p class="whitespace-normal truncate text-sm md:text-base tracking-wide lg:tracking-normal">
                    {{$comment['message']}}
                </p>

                <div class="ml-auto flex gap-2">
                    <p @class([
                        'text-xs',
                        'text-gray-500' => !($comment['sender'] === auth()->user()->email),
                        'text-white' => $comment['sender'] === auth()->user()->email
                    ])>

                    5:25 am

                    </p>

                    {{-- message status,only show if message belongs auth --}}
                    <div>
                        {{-- double ticks --}}
                        <span @class('text-gray-500')>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-all" viewBox="0 0 16 16">
                                <path d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l7-7zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0z"/>
                                <path d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708z"/>
                            </svg>
                        </span>

                        {{-- single ticks --}}
                        {{-- <span @class('text-gray-500')>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                                <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                            </svg>
                        </span> --}}
                    </div>
                
                </div>


            </div>

        </div>

        @endforeach
    </main>

    {{-- footer - send message --}}
    <footer class="shrink-0 z-10 bg-white inset-x-0">
        <div class="p-2 border-t">
            <form method="POST" autocapitalize="off">
                @csrf
                <input type="hidden" autocomplete="false" style="display:none">
                <div class="grid grid-cols-12">
                    <div class="grid col-span-1 items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-paperclip" viewBox="0 0 16 16">
                            <path d="M4.5 3a2.5 2.5 0 0 1 5 0v9a1.5 1.5 0 0 1-3 0V5a.5.5 0 0 1 1 0v7a.5.5 0 0 0 1 0V3a1.5 1.5 0 1 0-3 0v9a2.5 2.5 0 0 0 5 0V5a.5.5 0 0 1 1 0v7a3.5 3.5 0 1 1-7 0z"/>
                          </svg>
                    </div>

                    <input type="text" autocomplete="off" autofocus placeholder="write your message here" maxlength="1700" 
                    class="col-span-9 bg-gray-100 border-0 outline-0 focus:border-0 focus:ring-0 rounded-lg focus:outline-none"
                    >

                    <button class="col-span-2" type="submit">
                        Send
                    </button>
                </div>
            </form>

            @error('body')
                <p>{{ $message }}</p>
            @enderror
        </div>
    </footer>

    </div>
</div>
