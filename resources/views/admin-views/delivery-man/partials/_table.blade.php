@foreach($delivery_men as $key=>$dm)
<tr>
    <td>{{$key+1}}</td>
    <td>
        <a class="table-rest-info" href="{{route('admin.delivery-man.preview',[$dm['id']])}}">
            <img onerror="this.src='{{asset('public/assets/admin/img/160x160/img1.jpg')}}'"
                    src="{{asset('storage/app/public/delivery-man')}}/{{$dm['image']}}" alt="{{$dm['f_name']}} {{$dm['l_name']}}">
            <div class="info">
                <h5 class="text-hover-primary mb-0">{{$dm['f_name'].' '.$dm['l_name']}}</h5>
                <span class="d-block text-body">
                    <span class="rating">
                    <i class="tio-star"></i> 0
                    </span>
                </span>
            </div>
        </a>
    </td>
    <td>
        <a class="deco-none" href="tel:{{$dm['phone']}}">{{$dm['phone']}}</a>
    </td>
    <td>
        <a class="deco-none" href="tel:{{$dm['phone']}}">{{count($dm['orders'])}}</a>
    </td>
    <td>
        @if($dm->zone)
        <label class="text--title font-medium mb-0">{{$dm->zone->name}}</label>
        @else
        <label class="text--title font-medium mb-0">{{translate('messages.zone').' '.translate('messages.deleted')}}</label>
        @endif
    </td>
    <td>
        <div>
            {{translate('messages.currently_assigned_orders')}} : {{$dm->current_orders}}
        </div>
        <div>
            {{translate('messages.active_status')}} :
            @if($dm->application_status == 'approved')
                @if($dm->active)
                <strong class="text-capitalize text-primary">{{translate('messages.online')}}</strong>
                @else
                <strong class="text-capitalize text-secondary">{{translate('messages.offline')}}</strong>
                @endif
            @elseif ($dm->application_status == 'denied')
                <strong class="text-capitalize text-danger">{{translate('messages.denied')}}</strong>
            @else
                <strong class="text-capitalize text-info">{{translate('messages.pending')}}</strong>
            @endif
        </div>
    </td>
    <td>
        <div class="btn--container justify-content-center">
            <a class="btn action-btn btn--primary btn-outline-primary" href="{{route('admin.delivery-man.edit',[$dm['id']])}}" title="{{translate('messages.edit')}}"><i class="tio-edit"></i>
                </a>
                <a class="btn action-btn btn--danger btn-outline-danger" href="javascript:" onclick="form_alert('delivery-man-{{$dm['id']}}','{{translate('messages.Want to remove this deliveryman ?')}}')" title="{{translate('messages.delete')}}"><i class="tio-delete-outlined"></i>
            </a>
            <form action="{{route('admin.delivery-man.delete',[$dm['id']])}}" method="post" id="delivery-man-{{$dm['id']}}">
                @csrf @method('delete')
            </form>
        </div>
    </td>
</tr>
@endforeach
