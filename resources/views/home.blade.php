@extends('layouts.master')


@section('page_title')
Twitter
@stop

@section('other_css')
<link rel="stylesheet" href="{{ URL::asset('css/sub-styles.css') }}" type="text/css">
@stop

@section('nav_bar')
@include('layouts.navbar')
@stop

@section('body_content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form class="" action="{{ route('post-tweet') }}" id="frm_tweet">
                      <label for="txtarea_content" class="">What's happening?</label>
                      <span id="letter_counter" class="float-right">140</span>
                      <textarea class="form-control" id="txtarea_content" placeholder="Hi there {{ Auth::user()->username }}! Come on and share your thoughts!" name="txtarea_content" rows="3" cols="30" maxlength="140"></textarea>
                      <button type="button" class="btn btn-circle btn-blue float-right mt-2" name="btn_tweet" id="btn_tweet">Tweet</button>
                    </form>
                </div>
            </div>

            <div class="" id="div_tweets">
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="delete_modal" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-dialog h-100 d-flex flex-column justify-content-center my-0" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete this tweet?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body text-center">
            <button type="button" class="btn btn-secondary btn-circle font-weight-bold" data-dismiss="modal" id="btn_cancel_modal">Cancel</button>
            <button type="button" class="btn btn-blue btn-circle" id="btn_delete_modal">Delete</button>
          </div>
        </div>
      </div>
    </div>

</div>
@endsection
