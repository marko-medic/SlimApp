<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app = new Slim\App();
$appServices = new AppServices();
$customerService = $appServices->getCustomerService();

$app->get("/api/customers", function (Request $request, Response $response) {
    global $customerService;
    try {
        $customers = $customerService->get();
        echo json_encode($customers);
    } catch (Exception $ex) {
        echo '{"Error": '.$ex->getMessage().'}';
    }
});

$app->get("/api/customers/{id}", function (Request $request, Response $response) {
    global $customerService;
    // getAttribute je za link
    $id = $request->getAttribute("id");
    try {
        $customer = $customerService->find($id);
        echo json_encode($customer);
    } catch (Exception $ex) {
        echo '{"Error": '.$ex->getMessage().'}';
    }

});

$app->post("/api/customers", function (Request $request, Response $response) {
    global $customerService;
    // getParam je za json
    $firstName = $request->getParam("firstName");
    $lastName = $request->getParam("lastName");
    $phone = $request->getParam("phone");
    $email = $request->getParam("email");
    $city = $request->getParam("city");
    $state = $request->getParam("state");
    $address = $request->getParam("address");

    $customer = new Customer($firstName, $lastName, $phone, $email, $city, $state, $address);
    try {
        $customerService->create($customer);
        echo '{"notice": "Customer created"}';
    } catch (Exception $ex) {
        echo '{"Error": '.$ex->getMessage().'}';
    }

});

$app->put("/api/customers/{id}", function (Request $request, Response $response) {
    global $customerService;
    $id = $request->getAttribute("id");
    // getParam je za json
    $firstName = $request->getParam("firstName");
    $lastName = $request->getParam("lastName");
    $phone = $request->getParam("phone");
    $email = $request->getParam("email");
    $city = $request->getParam("city");
    $state = $request->getParam("state");
    $address = $request->getParam("address");

    $customer = new Customer($firstName, $lastName, $phone, $email, $city, $state, $address, $id);
    try {
        $customerService->update($customer);
        echo '{"notice": "Customer updated"}';
    } catch (Exception $ex) {
        echo '{"Error": '.$ex->getMessage().'}';
    }

});

$app->delete("/api/customers/{id}", function (Request $request, Response $response) {
    global $customerService;
    // getAttribute je za link
    $id = $request->getAttribute("id");
    try {
        $isRemoved = $customerService->remove($id);
        if ($isRemoved) {
            echo '{"notice": "Customer deleted"}';
        } else {
            echo '{"notice": "Customer was not deleted"}';
        }
    } catch (Exception $ex) {
        echo '{"Error": '.$ex->getMessage().'}';
    }

});