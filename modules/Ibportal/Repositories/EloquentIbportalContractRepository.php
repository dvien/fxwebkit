<?php

namespace Modules\Ibportal\Repositories;

use Illuminate\Support\Facades\Hash;
use Modules\Ibportal\Entities\IbportalPlan as Plan;
use Modules\Ibportal\Entities\IbportalPlanAliases as PlanAliases;
use Modules\Ibportal\Entities\IbportalAliases as Aliases;
use Modules\Ibportal\Entities\IbportalPlanUsers as PlanUsers;
use Modules\Mt4configrations\Entities\ConfigrationsSymbols as Symbols;
use Modules\Ibportal\Entities\IbportalUserIbid as UserIbid;
use Modules\Ibportal\Entities\IbportalAgentUser as AgentUser;
use Fxweb\Models\Mt4User;
use Fxweb\Models\User;
use Config;

class EloquentIbportalContractRepository implements IbportalContract
{

    /**
     */
    public function __construct()
    {
        //
    }


    public function getPlansByFilters($aFilters, $bFullSet = false, $sOrderBy = 'login', $sSort = 'ASC')
    {

        $oResult = new Plan();

        if (isset($aFilters['name']) && !empty($aFilters['name'])) {
            $oResult = $oResult->where('name', 'like', '%' . $aFilters['name'] . '%');
        }


        $oResult = $oResult->orderBy($sOrderBy, $sSort);

        if (!$bFullSet) {
            $oResult = $oResult->paginate(Config::get('fxweb.pagination_size'));
        } else {
            $oResult = $oResult->get();

        }

        return $oResult;

    }

    public function getClientPlansByFilters($aFilters, $bFullSet = false, $sOrderBy = 'login', $sSort = 'ASC',$clientID)
    {

        $oResult =Plan::with('users')->whereHas('users',function ($query)use($clientID){$query->where('user_id',$clientID);});

        if (isset($aFilters['name']) && !empty($aFilters['name'])) {
            $oResult = $oResult->where('name', 'like', '%' . $aFilters['name'] . '%');
        }


        $oResult = $oResult->orderBy($sOrderBy, $sSort);

        if (!$bFullSet) {
            $oResult = $oResult->paginate(Config::get('fxweb.pagination_size'));
        } else {
            $oResult = $oResult->get();

        }

        return $oResult;

    }

    public function addPlan($planName, $planType, $public)
    {
        $planId = Plan::create([
            'name' => $planName,
            'type' => $planType,
            'public' => $public
        ]);

        return $planId->id;

    }

    public function addPlanSymbols($planId, $symbols = [], $symbolsType = 0, $symbolsValue = 0)
    {
        for ($i = 0; $i < count($symbols); $i++) {
            PlanAliases::create([
                'plan_id' => $planId,
                'alias_id' => $symbols[$i],
                'type' => $symbolsType[$i],
                'value' => $symbolsValue[$i],
            ]);
        }

    }

    public function getAliases()
    {
        $oAliases = Aliases::select(['id', 'alias'])->get();
        $aAliases = [];
        foreach ($oAliases as $alias) {
            $aAliases[$alias->id] = $alias->alias;
        }
        return $aAliases;
    }


    public function deletePlan($id)
    {

        $id = (is_array($id)) ? $id : [$id];
        $plan = Plan::whereIn('id', $id)->delete();


        if ($plan) {
            return [trans('ibportal::ibportal.deleted_successfully_message')];
        } else {
            return [trans('ibportal::ibportal.deleted_faild_message')];
        }
    }

    public function getPlanDetails($planId)
    {

        $planDetails = Plan::with('aliases')->where('id', $planId)->get();

        return $planDetails;
    }


    public function getAliasesByFilters($aFilters, $bFullSet = false, $sOrderBy = 'login', $sSort = 'ASC')
    {

        $oResult = new Aliases();

        if (isset($aFilters['name']) && !empty($aFilters['name'])) {
            $oResult = $oResult->where('alias', 'like', '%' . $aFilters['name'] . '%');
        }


        $oResult = $oResult->orderBy($sOrderBy, $sSort);

        if (!$bFullSet) {
            $oResult = $oResult->paginate(Config::get('fxweb.pagination_size'));
        } else {
            $oResult = $oResult->get();

        }

        return $oResult;

    }

    public function addAlias($alias, $operand, $value)
    {

        $result = Aliases::create(['alias' => $alias,
            'operand' => $operand,
            'value' => $value]);

        return ($result)? true:false;
    }

    public function getPlanAssignedUsers($planId,&$users){

        $oResult= PlanUsers::select('user_id')->where('plan_id',$planId)->get();

        $assignedUsers=[];
        foreach($oResult as $result){
            if(!isset($users[$result->user_id])) continue;
            $assignedUsers[$result->user_id]=$users[$result->user_id];
            unset($users[$result->user_id]);
        }
        return $assignedUsers;
    }

    public function getAgentAssignedUsers($agentId,&$users){

        $oResult= AgentUser::select('user_id')->where('agent_id',$agentId)->get();

        $assignedUsers=[];
        foreach($oResult as $result){
            if(!isset($users[$result->user_id])) continue;
            $assignedUsers[$result->user_id]=$users[$result->user_id];
            unset($users[$result->user_id]);
        }
        return $assignedUsers;
    }

    public function assignUsersToPlan($planId,$selectedUsers){
        $deleteResult=PlanUsers::where('plan_id',$planId)->delete();
        $insertResult=false;
        if(!empty($selectedUsers)){
            $users=[];
            foreach($selectedUsers as $user){
                $users[]=['plan_id'=>$planId,'user_id'=>$user];
            }

            $insertResult=PlanUsers::insert($users);
        }else{
            $insertResult=true;
        }

        return ($insertResult)?true:false;
    }

    public function assignUsersToAgent($agentId,$planId,$selectedUsers){

        $deleteResult=AgentUser::where('agent_id',$agentId)->delete();
        $insertResult=false;
        if(!empty($selectedUsers)){
            $users=[];
            foreach($selectedUsers as $user){
                $users[]=['agent_id'=>$agentId,'user_id'=>$user,'plan_id'=>$planId];
            }

            $insertResult=AgentUser::insert($users);
        }else{
            $insertResult=true;
        }

        return ($insertResult)?true:false;
    }



    public function getSymbols() {

        $aSymbols = Symbols::select('name')->distinct()->get()->toArray();

        $symbolsJavaArray = [];
        foreach ($aSymbols as $key => $symbols) {

            $symbolsJavaArray[] = '"' . $symbols['name'] . '"';
        }

        $symbolsJavaArray = join(',', $symbolsJavaArray);

        return $symbolsJavaArray;
    }

    public function generateUserIbId($userId){
        $IbId= Hash::make($userId);
        $insertResult=UserIbid::create(['user_id'=>$userId,'user_ibid'=>$IbId]);
        if(count($insertResult)){
            $planResult=Plan::where('public',true)->get();
            $aPublicPlans=[];
            foreach($planResult as $plan){
                $aPublicPlans[]=['plan_id'=>$plan->id,'user_id'=>$userId];
            }
            $assignPublicPlansResult=PlanUsers::insert($aPublicPlans);
        }
        return $insertResult;
    }

    public function getAgentName()
    {
        $oResult = User::get();
        $aPublicUsers=[];
        foreach($oResult as $Users){
            $aPublicUsers[$Users->id]=$Users->first_name.$Users->last_name;
        }
        return($aPublicUsers);

    }

    public function getPlansName($agents=[])
    {
        $oResult =Plan::with('users')->whereHas('users',function($query) use($agents){
            $query->whereIn('user_id',$agents);
        });

        $oResult=$oResult->get();

        $aPublicPlans=[];
        if($oResult){
            foreach($oResult as $plan){
                $aPublicPlans[$plan->id]=$plan->name;
            }
        }
        return $aPublicPlans;
    }


    public function getUsersName($plans=[])
    {
        $oResult = User::with('users')->whereHas('users',function($query) use($plans){
            $query->whereIn('plan_id',$plans);
        });

        $oResult=$oResult->get();

        $aPublicUsers=[];
        foreach($oResult as $Users){
            $aPublicUsers[$Users->id]=$Users->first_name.$Users->last_name;
        }
        return($aPublicUsers);
    }

    public function getMt4UsersName($users=[])
    {
        $oResult = Mt4User::with('accounts')->whereHas('accounts',function($query) use($users){
        $query->whereIn('id',$users);
    });

        $oResult=$oResult->get();

        $aPublicMt4Users=[];
        foreach($oResult as $mt4Users){
            $aPublicMt4Users[$mt4Users->LOGIN]=$mt4Users->NAME;
        }
        return($aPublicMt4Users);
    }

}
