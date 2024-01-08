<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class FeestbegeleidingController extends Controller
{

    //-----People Query's and mutations-----//

    //-->Query<--//
    public function peopleQuery(){
        $PeopleQuery = <<<'EOD'
            query{
                getAllPeople{
                    id
                    firstName
                    lastName
                    association
                }
            }
        EOD;

        $PeopleResponse = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post('http://localhost:4000/graphql', [
            'query' => $PeopleQuery
        ]);
        return json_decode($PeopleResponse)->data->getAllPeople;        
    }
    public function peopleView(){
        $people = $this->peopleQuery();
        return view('FeestbegeleidingViews\people', [
            'people' => $people,
        ]);
    }

    public function showPerson(Request $request){
        $personID = intval($request->input('personID'));
        $firstName = $request->input('firstName');
        $lastName = $request->input('lastName');
        $association = $request->input('association');
        $personEventsQuery = <<<'GQL'
            query getEventBypersonID($personID:Int!){
                getEventBypersonID(personID:$personID){
                    nameEvent
                }
            }
        GQL;
        
        $variables = [
            'personID' => $personID,
        ];

        $eventsResponse = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post('http://localhost:4000/graphql', [
            'query' => $personEventsQuery,
            'variables'=> $variables
        ]);

        $events = json_decode($eventsResponse)->data->getEventBypersonID;
        return view('FeestbegeleidingViews\specificPerson', [
            'events' => $events,
            'personID' => $personID,
            'firstName' => $firstName,
            'lastName' => $lastName,
            'association' => $association

        ]);
    }

    //-->mutation<--//
    public function personForm(){
        return view('FeestbegeleidingViews\addPerson');
    }

    public function createPerson(Request $request){
        $firstName = $request->input("firstName");
        $lastName =  $request->input("lastName");
        $association = $request->input("association");

        $personMutation = <<<'GQL'
            mutation createPerson($firstName: String!, $lastName: String!, $association: String!) {
                createPerson(firstName: $firstName, lastName: $lastName, association: $association){
                firstName
                lastName
                association
                }
            }
        GQL;

        $variables = [
            'firstName' => $firstName,
            'lastName' => $lastName,
            'association' => $association,
        ];

        $graphqlEndpoint = 'http://localhost:4000/graphql';
        $client = new \GuzzleHttp\Client();

        $response = $client->request('POST', $graphqlEndpoint, [
        'headers' => [
            'Content-Type' => 'application/json',
        ],
        'json' => [
            'query' => $personMutation,
            'variables'=> $variables
        ]
        ]);
        
        $people = $this->peopleQuery();
        return view('FeestbegeleidingViews\people', [
            'people' => $people,
        ]);
    }




    //-----Association Query's and mutations-----//
    //-->Query<--//
    public function associationQuery(){
        $associationsQuery = <<<'EOD'
            query{
                getAllVerenigingen{
                    id
                    name
                }
            }
        EOD;
        
        $associationsResponse = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post('http://localhost:4000/graphql', [
            'query' => $associationsQuery
        ]);

        return json_decode($associationsResponse)->data->getAllVerenigingen;
    }
    public function associationView(){
        $association = $this->associationQuery();
        return view('FeestbegeleidingViews\associations', [
            'associations' => $association,
        ]);
    }

    public function showAssociation(Request $request){
        $associationName = $request->input('associationName');
        $associationQuery = <<<'GQL'
            query getMembersByAssociationName($associationName: String! ){
                getMembersByAssociationName(associationName: $associationName){
                    id
                    firstName
                    lastName
                }
            }
        GQL;

        $variables = [
            'associationName' => $associationName,
        ];

        $associationResponse = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post('http://localhost:4000/graphql', [
            'query' => $associationQuery,
            'variables'=> $variables
        ]);


        $members = json_decode($associationResponse)->data->getMembersByAssociationName;

        return view('FeestbegeleidingViews\specificAssociation', [
            'people' => $members,
            'association'=> $associationName
        ]);
    }

    

    //-->mutation<--//
    public function associationForm(){
        return view('FeestbegeleidingViews\addAssociation');
    }

    public function createAssociation(Request $request){
        $name = $request->input("name");

        $associationMutation = <<<'GQL'
            mutation createAssociation($name:String!){
                createAssociation(name:$name){
                id
              }
            }
        GQL;

        $variables = [
            'name' => $name,
        ];

        $graphqlEndpoint = 'http://localhost:4000/graphql';
        $client = new \GuzzleHttp\Client();

        $response = $client->request('POST', $graphqlEndpoint, [
        'headers' => [
            'Content-Type' => 'application/json',
        ],
        'json' => [
            'query' => $associationMutation,
            'variables'=> $variables
        ]
        ]);
        $association = $this->associationQuery();
        return view('FeestbegeleidingViews\association', [
            'associations' => $association,
        ]);
    }

    //-----Event Query's and mutations-----//
    //-->Query<--//
    public function eventQuery(){
        $EventsQuery = <<<'EOD'
            query{
                getAllEvents{
                    id
                    nameEvent
                    firstShift{
                        firstName
                        lastName
                        association
                    }
                    secondShift{
                        firstName
                        lastName
                        association
                    }
                }
            }
        EOD;

        $eventsResponse = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post('http://localhost:4000/graphql', [
            'query' => $EventsQuery
        ]);
        return json_decode($eventsResponse)->data->getAllEvents;        
    }
    public function eventView(){
        $events = $this->eventQuery();
        return view('FeestbegeleidingViews\events', [
            'events' => $events,
        ]);
    }

    //-->mutation<--//
    public function eventForm(){
        return view('FeestbegeleidingViews\addevent');
    }

    public function createEvent(Request $request){
        $eventName = $request->input("eventName");
        $firstName1 = $request->input("firstName1");
        $lastName1 =  $request->input("lastName1");
        $association1 = $request->input("association1");
        $firstName2 = $request->input("firstName2");
        $lastName2 =  $request->input("lastName2");
        $association2 = $request->input("association2");

        $eventMutation = <<<'GQL'
            mutation createEvent($eventName: String!, $firstName1: String!, $lastName1: String!, $association1: String!, $firstName2: String!, $lastName2: String!, $association2: String!){
                createEvent(nameEvent:$eventName, firstName1: $firstName1, lastName1: $lastName1, association1: $association1, firstName2: $firstName2, lastName2: $lastName2, association2: $association2){
                  id
                }
            }
        GQL;

    $variables = [
        'eventName' =>$eventName,
        'firstName1' => $firstName1,
        'lastName1' => $lastName1,
        'association1' => $association1,
        'firstName2' => $firstName2,
        'lastName2' => $lastName2,
        'association2' => $association2,
    ];
        $graphqlEndpoint = 'http://localhost:4000/graphql';
        $client = new \GuzzleHttp\Client();

        $response = $client->request('POST', $graphqlEndpoint, [
        'headers' => [
            'Content-Type' => 'application/json',
            // include any auth tokens here
        ],
        'json' => [
            'query' => $eventMutation,
            'variables'=> $variables
        ]
        ]);
        

        $events = $this->eventQuery();
        return view('FeestbegeleidingViews\events', [
            'events' => $events,
        ]);
    }



    

    
}

