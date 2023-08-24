<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Follower;
use App\Models\MerchSale;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function update(Request $request){
        $model = $request->get('model');
        $id = $request->get('id');
        $status = $request->get('status');

        if($model === 'follower'){
            $event = Follower::find($id);
        }else if($model === 'donation'){
            $event = Donation::find($id);
        }else if($model === 'sale'){
            $event = MerchSale::find($id);
        }else if($model === 'subscriber'){
            $event = Subscriber::find($id);
        }

        $event->status_read = $status;
        $event->save();

        return redirect('dashboard');
    }
}
