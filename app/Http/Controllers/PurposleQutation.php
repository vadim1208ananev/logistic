<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Proposal;
// use App\ProposleQutation;
class PurposleQutation extends Controller
{
	
	function __construct()
	{
		# code...
		$this->middleware(['auth', 'verified']); 
	}
	public function all_purposles($id){
		$data['proposals'] = Proposal::with('user')->where('quotation_id',$id)
        ->get();
        $data['page_name'] = 'All Proposals';
        $data['page_title'] = 'View All proposals | LogistiQuote';
		//print_r($data['proposals']->toArray());
		return view('panels.proposal.all_purposles', $data);

	}

}

 ?>