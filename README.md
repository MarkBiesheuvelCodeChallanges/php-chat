# Assignment

Write a very simple 'chat' application backend in PHP.
A user should be able to send a simple text message to another user and a user
should be able to get the messages sent to him and the author users of those
messages.

The users and messages should be stored in a simple SQLite database.
All communication between the client and server should happen over a simple JSON
based protocol over HTTP (which may be periodically refreshed to poll for new
messages). A GUI, user registration and user login are not needed but the users
should be identified by some token or ID in the HTTP messages and the database.

You can use any frameworks or libraries that you like, with the exception of a
library or framework that completely implements this functionality. We don't 
doubt your ability to implement something like this, its the way you do it that
interests us.

---

# Solution

Since the assignment requests a very simple chat application, I didn't implement
any checks to confirm whether users really received a message or not.

## Commands

To install all dependencies
```bash
composer install
```

To create a dotenv file (change database settings to local database)
```bash
cp .env.example .env
```

Perform database migration
```bash
php artisan migrate
```

To run the server
```bash
php artisan serve
```
To get a list of all users *(needs httpie)*
```bash
http --session=chat GET localhost:8000/api/users
```

To send a message to another user 
```bash
http --session=chat POST localhost:8000/api/users/39860/messages content="Hello user #39860"
```

To receive all messages send to you by another user *(needs httpie)*
```bash
http --session=chat GET localhost:8000/api/messages
```

Hint: you can start mimick multiple users by chaging the session parameter of httpie