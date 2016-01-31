<?php namespace Modules\Mt4configrations\Http\Controllers\admin;

use Pingpong\Modules\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use Modules\Mt4Configrations\Repositories\Mt4ConfigrationsContract as Mt4Configrations;

class Mt4ConfigrationsController extends Controller
{


    public function index()
    {
        return view('Mt4configrations::index');
    }


    protected $Mt4Configrations;

    public function __construct(
        Mt4Configrations $Mt4Configrations
    )
    {

        $this->Mt4Configrations = $Mt4Configrations;
    }


    public function getSymbolsList(Request $oRequest)
    {

        $sSort = ($oRequest->sort) ? $oRequest->sort : 'desc';
        $sOrder = ($oRequest->order) ? $oRequest->order : 'id';

        $oResults = null;

        $aFilterParams = [
            'name' => '',
            'sort' => $sSort,
            'order' => $sOrder,
        ];

        if ($oRequest->has('search')) {

            $aFilterParams['name'] = $oRequest->name;


            $oResults = $this->Mt4Configrations->getSymbolsByFilters($aFilterParams, false, $sOrder, $sSort);
        }


        return view('mt4configrations::symbol_list')->with('oResults', $oResults)
            ->with('aFilterParams', $aFilterParams);
    }

    public function getSecuritiesList(Request $oRequest)
    {

        $sSort = ($oRequest->sort) ? $oRequest->sort : 'desc';
        $sOrder = ($oRequest->order) ? $oRequest->order : 'id';

        $oResults = null;

        $aFilterParams = [
            'name' => '',
            'sort' => $sSort,
            'order' => $sOrder,
        ];

        if ($oRequest->has('search')) {

            $aFilterParams['name'] = $oRequest->name;


            $oResults = $this->Mt4Configrations->getSecuritiesByFilters($aFilterParams, false, $sOrder, $sSort);

        }


        return view('mt4configrations::securities_list')->with('oResults', $oResults)
            ->with('aFilterParams', $aFilterParams);

    }

    public function getGroupsList(Request $oRequest)
    {

        $sSort = ($oRequest->sort) ? $oRequest->sort : 'desc';
        $sOrder = ($oRequest->order) ? $oRequest->order : 'id';

        $oResults = null;

        $aFilterParams = [
            'name' => '',
            'sort' => $sSort,
            'order' => $sOrder,
        ];


        if ($oRequest->has('search')) {


            $aFilterParams['name'] = $oRequest->name;


            $oResults = $this->Mt4Configrations->getGroupsByFilters($aFilterParams, false, $sOrder, $sSort);


        }


        return view('mt4configrations::group_list')->with('oResults', $oResults)
            ->with('aFilterParams', $aFilterParams);

    }


    public function postGroupsList(Request $oRequest)
    {


        $sSort = ($oRequest->sort) ? $oRequest->sort : 'desc';
        $sOrder = ($oRequest->order) ? $oRequest->order : 'id';

        $oResults = null;

        $aFilterParams = [
            'name' => '',
            'sort' => $sSort,
            'order' => $sOrder,
        ];


            $oResults = $this->Mt4Configrations->addGroups();


        return Redirect::route('admin.mt4Configrations.groupsList');

    }

    public function postSecuritiesList(Request $oRequest)
    {


        $sSort = ($oRequest->sort) ? $oRequest->sort : 'desc';
        $sOrder = ($oRequest->order) ? $oRequest->order : 'id';

        $oResults = null;

        $aFilterParams = [
            'name' => '',
            'sort' => $sSort,
            'order' => $sOrder,
        ];


        $oResults = $this->Mt4Configrations->addSecurities();


        return Redirect::route('admin.mt4Configrations.securitiesList');

    }


    public function postSymbolsList(Request $oRequest)
    {


        $sSort = ($oRequest->sort) ? $oRequest->sort : 'desc';
        $sOrder = ($oRequest->order) ? $oRequest->order : 'id';

        $oResults = null;

        $aFilterParams = [
            'name' => '',
            'sort' => $sSort,
            'order' => $sOrder,
        ];


        $oResults = $this->Mt4Configrations->addSymbols();


        return Redirect::route('admin.mt4Configrations.symbolsList');

    }
}