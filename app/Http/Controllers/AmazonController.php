<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class AmazonController extends Controller
{
    public function show($id)
    {
        Session::put('product_id', $id);

        return Socialite::driver('amazon')->with(['myParam' => 'event_slug=foobar'])->redirect();
    }

    public function callback()
    {

        $id = Session::get('product_id');
        Session::forget('product_id');
        $user = Socialite::driver('amazon')->user();
        dump($user);
        dump($id);
        switch ($id) {
            case 1:
                echo "<a href='https://www.amazon.com/Logitech-MK270-Wireless-Keyboard-Mouse/dp/B079JLY5M5/ref=sr_1_1?dchild=1&fst=as%3Aoff&pf_rd_i=16225007011&pf_rd_m=ATVPDKIKX0DER&pf_rd_p=74069509-93ef-4a3c-8dca-a9e3fa773a64&pf_rd_r=K8KZHJEQQAYF14EG534M&pf_rd_s=merchandised-search-4&pf_rd_t=101&qid=1487012920&rnid=16225007011&s=computers-intl-ship&sr=1-1'>Url to product</a>";
                break;
            case 2:
                echo "<a href='https://www.amazon.com/Bedtime-Originals-Express-Plush-Elephant/dp/B00GHAGGOG/?_encoding=UTF8&pd_rd_w=QShot&pf_rd_p=bfc179e3-59f8-4e77-9d9b-858d10937727&pf_rd_r=D1Y0HAZ01BX5HHHGGRD8&pd_rd_r=7ec166c6-5415-4dbd-b0f8-0858343400ec&pd_rd_wg=Doqwo&ref_=pd_gw_unk'>Url to product</a>";
                break;
            case 3:
                echo "<a href='https://www.amazon.com/Alex-Vando-Shirts-Regular-Sleeve/dp/B072QYBXYV/?_encoding=UTF8&pd_rd_w=VcS8z&pf_rd_p=fd21c832-99b6-4b32-a158-f2c869351ced&pf_rd_r=X4KSN0Z8AANTBQFZKKEX&pd_rd_r=63e03caf-c446-45e3-b6d9-fc578a03606b&pd_rd_wg=wqIjL&ref_=pd_gw_unk'>Url to product</a>";
                break;
        }

    }
}