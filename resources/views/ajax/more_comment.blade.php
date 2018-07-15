                    @if(isset($postComment))
                        @foreach($postComment as $key => $value)
                        <div class="commnets-area">
                            <div class="comment">

                                <div class="post-info">

                                    <div class="left-area">
                                        <a class="avatar" href="#"><img src="{{ $value['createdby']['image'] }}" alt="Profile Image"></a>
                                    </div>

                                    <div class="middle-area">
                                        <a class="name" href="#"><b>{{ $value['createdby']['name'] }}</b></a>
                                        <h6 class="date">on  {{date('M d, Y H:i' , strtotime($value['created_at'] )) }}</h6>
                                    </div>

                                </div><!-- post-info -->

                                <p>{{ $value['text'] }}</p>

                            </div>
                        </div>
                        @endForeach
                    @endIf