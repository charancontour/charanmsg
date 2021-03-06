<?php namespace Charan;
use App\User;
use App\Http\Controllers\Controller;


class DevStatusController extends Controller {
  /**
  * Display an object with a Welcome Status
  *
  * @return Response
  */
  public function home(){
    return view('welcome');
    //  return response(['Developer Status' => 'Welcome to Dev Status Laravel 5 package']);

  }

  /**
  * Display developer status based on the number of Github Repos
  *
  * @return Response
  */
  public function index($username)
  {

    $options = array('http' => array('user_agent'=> config('DevStatus.user-agent')));
    $context = stream_context_create($options);
    $url = config('DevStatus.url') . "/users/" . urlencode($username);
    $result = json_decode(file_get_contents($url, true, $context));
    $name = $result->name;
    $public_repos = $result->public_repos;
    $status = "";

    if($public_repos <= 10){
      $status = "Rookie";
    }
    if( $public_repos > 10 && $public_repos <= 25){
      $status = "Intermediate";
    }
    if( $public_repos > 25){
      $status = "Ninja";
    }

    $finalStatus = $name . " is a " . $status . " Open Source Evangelist";

    return response([
       'Developer Status' => $finalStatus
    ]);

  }
}
