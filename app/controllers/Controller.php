<?php
class Controller
{
    private $database;
    private $success = false;
    private $message = null;

    public function __construct()
    {
        $this->database = new Database();

        $action = post("action") ?? null;

        if (method_exists($this, $action)) {
            $this->$action();
        } else {
            $this->response(false, "Action do not exists!");
        }
    }

    private function login()
    {
        $username = post("username");
        $password = post("password");

        $user_data = $this->database->select_one("users", ["username" => $username]);

        if ($user_data) {
            $hash = $user_data["password"];

            if (password_verify($password, $hash)) {
                session("user_id", $user_data["id"]);
                session("user_type", $user_data["user_type"]);

                $notification = [
                    "title" => "Success!",
                    "text" => "Welcome, " . $user_data["name"] . "!",
                    "icon" => "success",
                ];

                session("notification", $notification);

                $this->success = true;
            }
        }

        $this->response($this->success, $this->message);
    }

    private function register()
    {
        $name = post("name");
        $username = post("username");
        $password = post("password");

        $user_data = $this->database->select_one("users", ["username" => $username]);

        if (!$user_data) {
            $data = [
                "uuid" => $this->database->generate_uuid(),
                "name" => $name,
                "username" => $username,
                "password" => password_hash($password, PASSWORD_BCRYPT),
                "user_type" => "customer",
                "image" => "default-user-image.png",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s"),
            ];

            $this->database->insert("users", $data);

            session("user_id", $this->database->get_last_insert_id());

            $notification = [
                "title" => "Success!",
                "text" => "Your account has been saved successfully.",
                "icon" => "success",
            ];

            session("notification", $notification);

            $this->success = true;
        }

        $this->response($this->success, $this->message);
    }

    private function new_booking_modal()
    {
        $passenger_id = post("passenger_id");
        $van_id = post("van_id");
        $origin = post("origin");
        $destination = post("destination");
        $trip_date = post("trip_date");
        $trip_time = post("trip_time");
        $fare = post("fare");

        $data = [
            "uuid" => $this->database->generate_uuid(),
            "passenger_id" => $passenger_id,
            "van_id" => $van_id,
            "origin" => $origin,
            "destination" => $destination,
            "trip_date" => $trip_date,
            "trip_time" => $trip_time,
            "fare" => $fare,
            "created_at" => date("Y-m-d H:i:s"),
            "updated_at" => date("Y-m-d H:i:s"),
        ];

        if ($this->database->insert("bookings", $data)) {
            $notification = [
                "title" => "Success!",
                "text" => "You have successfully booked a ride.",
                "icon" => "success",
            ];

            session("notification", $notification);

            $this->success = true;
        }

        $this->response($this->success, $this->message);
    }

    private function update_status()
    {
        $booking_id = post("booking_id");
        $status = post("status");

        $data = [
            "status" => $status,
            "updated_at" => date("Y-m-d H:i:s"),
        ];

        $this->database->update("bookings", $data, ["id" => $booking_id]);

        $notification = [
            "title" => "Success!",
            "text" => "A booking has been " . $status . ".",
            "icon" => "success",
        ];

        session("notification", $notification);

        $this->success = true;

        $this->response($this->success, $this->message);
    }

    private function get_van_data()
    {
        $van_id = post("van_id");

        $van_data = $this->database->select_one("vans", ["id" => $van_id]);

        $this->response(true, $van_data);
    }

    private function get_user_data()
    {
        $user_id = post("user_id");

        $user_data = $this->database->select_one("users", ["id" => $user_id]);

        $this->response(true, $user_data);
    }
    
    private function view_message()
    {
        $message_id = post("message_id");

        $message_data = $this->database->select_one("messages", ["id" => $message_id]);

        $this->response(true, $message_data);
    }

    private function send_message()
    {
        $name = post("name");
        $email = post("email");
        $subject = post("subject");
        $message = post("message");

        $data = [
            "uuid" => $this->database->generate_uuid(),
            "name" => $name,
            "email" => $email,
            "subject" => $subject,
            "message" => $message,
            "created_at" => date("Y-m-d H:i:s"),
            "updated_at" => date("Y-m-d H:i:s"),
        ];

        $this->database->insert("messages", $data);

        $notification = [
            "title" => "Success!",
            "text" => "Your message was sent successfully.",
            "icon" => "success",
        ];

        session("notification", $notification);

        $this->success = true;

        $this->response($this->success, $this->message);
    }

    private function update_account()
    {
        $name = post("name");
        $username = post("username");
        $password = post("password");
        $id = post("id");
        $old_password = post("old_password");

        if (!$password) {
            $password = $old_password;
        } else {
            $password = password_hash($password, PASSWORD_BCRYPT);
        }

        $data = [
            "name" => $name,
            "username" => $username,
            "password" => $password,
            "updated_at" => date("Y-m-d H:i:s"),
        ];

        if ($this->database->update("users", $data, ["id" => $id])) {
            $notification = [
                "title" => "Success!",
                "text" => "Your account was updated successfully.",
                "icon" => "success",
            ];

            session("notification", $notification);

            $this->success = true;
        }

        $this->response($this->success, $this->message);
    }

    private function new_van()
    {
        $model = post("model");
        $brand = post("brand");
        $capacity = post("capacity");
        $status = post("status");
        $image = upload("image", "uploads/vans");

        if ($image) {
            $is_exists = $this->database->select_one("vans", ["model" => $model, "brand" => $brand], "AND");

            if (!$is_exists) {
                $data = [
                    "uuid" => $this->database->generate_uuid(),
                    "model" => $model,
                    "brand" => $brand,
                    "capacity" => $capacity,
                    "status" => $status,
                    "image" => $image,
                    "created_at" => date("Y-m-d H:i:s"),
                    "updated_at" => date("Y-m-d H:i:s"),
                ];

                $this->database->insert("vans", $data);

                $notification = [
                    "title" => "Success!",
                    "text" => "The van has been successfully saved.",
                    "icon" => "success",
                ];

                session("notification", $notification);

                $this->success = true;
            }
        } else {
            $notification = [
                "title" => "Oops...",
                "text" => "There was an error processing your request.",
                "icon" => "error",
            ];

            session("notification", $notification);

            $this->success = true;
        }

        $this->response($this->success, $this->message);
    }

    private function update_van()
    {
        $id = post("id");
        $model = post("model");
        $brand = post("brand");
        $capacity = post("capacity");
        $status = post("status");
        $image = upload("image", "uploads/vans");
        $old_image = post("old_image");

        if (!$image) {
            $image = $old_image;
        }

        if ($image) {
            $sql = "SELECT FROM vans WHERE model='" . $model . "' AND brand='" . $brand . "' AND id != '" . $id . "'";
            $is_exists = $this->database->query($sql);

            if (!$is_exists) {
                $data = [
                    "model" => $model,
                    "brand" => $brand,
                    "capacity" => $capacity,
                    "status" => $status,
                    "image" => $image,
                    "updated_at" => date("Y-m-d H:i:s"),
                ];

                $this->database->update("vans", $data, ["id" => $id]);

                $notification = [
                    "title" => "Success!",
                    "text" => "The van has been successfully updated.",
                    "icon" => "success",
                ];

                session("notification", $notification);

                $this->success = true;
            }
        } else {
            $notification = [
                "title" => "Oops...",
                "text" => "There was an error processing your request.",
                "icon" => "error",
            ];

            session("notification", $notification);

            $this->success = true;
        }

        $this->response($this->success, $this->message);
    }

    private function delete_van()
    {
        $van_id = post("van_id");

        $this->database->delete("vans", ["id" => $van_id]);

        $notification = [
            "title" => "Success!",
            "text" => "The van has been deleted successfully.",
            "icon" => "success",
        ];

        session("notification", $notification);

        $this->success = true;

        $this->response($this->success, $this->message);
    }
    
    private function delete_message()
    {
        $message_id = post("message_id");

        $this->database->delete("messages", ["id" => $message_id]);

        $notification = [
            "title" => "Success!",
            "text" => "A message has been deleted successfully.",
            "icon" => "success",
        ];

        session("notification", $notification);

        $this->success = true;

        $this->response($this->success, $this->message);
    }

    private function logout()
    {
        session("user_id", "unset");
        session("user_type", "unset");

        $notification = [
            "title" => "Success!",
            "text" => "You have been logged out.",
            "icon" => "success",
        ];

        session("notification", $notification);

        $this->success = true;

        $this->response($this->success, $this->message);
    }

    private function response(bool $success, $message = null)
    {
        echo json_encode(['success' => $success, 'message' => $message]);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    new Controller();
} else {
    redirect("500", 500);
}
