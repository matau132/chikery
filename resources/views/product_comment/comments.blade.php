@foreach($comments as $model)
<?php 
  $unrated_star = 5-$model->rating; 
  $count = 1;
?>
<div class="ps-block--review position-relative">
  <div class="ps-block__thumbnail"><img src="{{url('public/uploads/users')}}/{{$model->customer->avatar}}" alt="" width="70px" height="70px" style="border-radius: 50%"></div>
  <div class="ps-block__content">
    <figure>
      <figcaption>By <strong> {{$model->customer->name}}</strong> <span> {{$model->created_at->format('d/m/Y')}}</span></figcaption>
      <div class="d-flex" style="height:28px">
        @for($i=0;$i<$model->rating;$i++)
        <i class="fa fa-star" style="color: #f7941d; margin-right: 2px"></i>
        @endfor
        @for($i=0;$i<$unrated_star;$i++)
        <i class="fa fa-star" style="color: #d2d2d2; margin-right: 2px"></i>
        @endfor
      </div>
    </figure>
    <p>{{$model->content}}</p>
  </div>
  @if($user_id == $model->customer_id)
  <i class="fa fa-times delete_cmt" style="position: absolute;right:0;top:0;color:#ce873a;width: initial;cursor:pointer" title="delete"></i>
  <input type="hidden" value="{{$model->id}}">
  @endif
</div>
@endforeach