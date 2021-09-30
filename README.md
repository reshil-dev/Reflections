## Technology Stack
- Laravel
- VueJs
- MySql
- Make use of Bulma(https://bulma.io/) css framework cdn for css.

## Understanding/ Implementation Considerations
- only considering open status tasks, no enough details to consider the inprogress tasks,no field provided for the time spend on in progress tasks,so to calculate the required time to spend on the same.
- Consider priority 1 as the high priority task, 2 comes next in the line and so on.

## Steps to follow for installation
- update database details in .env file
- composer install
- php artisan migrate
- npm install
- npm run dev

## Application details

The single page application has mainly 3 links
- Home -> Serves the home page
- Tasks -> List all Tasks from the database
- Priority Task -> A form with 3 fields 
    - Time Left Today: (hours in int eg 3), 
    - Time for Tomorrow: (hours in int eg 3), 
    - Set Date: (2020-12-15 09:55:34) with backend validation
Submitting the form will send an ajax request to the backend and fetch a high priority task.

A route written for importing the json data in to database tasks table, it resides in the routes/web.php file for the time being
its better to write this as a console command, so that we can reuse it when new json files comes in, adding an imported flag will avoid duplications
   
![TasksListing](https://user-images.githubusercontent.com/63226447/135328459-a2e6453a-c7e5-4fef-b758-759cb9692f62.png)

![FormValidation](https://user-images.githubusercontent.com/63226447/135328494-f73fdee2-9900-4abd-9de3-2de9d8d53e1f.png)

![PriorityTaskPage](https://user-images.githubusercontent.com/63226447/135328527-0fcae145-5237-4090-aa23-d6e8e08d5c89.png)


