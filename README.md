[![](https://scdn.rapidapi.com/RapidAPI_banner.png)](https://rapidapi.com/package/Todoist/functions?utm_source=RapidAPIGitHub_TodoistFunctions&utm_medium=button&utm_content=RapidAPI_GitHub)
# Todoist Package
Todoist offers more useful features than any other to do service. So you can do more to customize the experience, organize your tasks and projects, and optimize your productivity.
* Domain: [todoist.com](https://todoist.com)
* Credentials: clientId, clientSecret

## How to get credentials: 
1. Register on the [todoist.com](https://todoist.com).
2. Create your Todoist Application in [console](https://developer.todoist.com/appconsole.html).
3. After creation app, you will receive clientId / clientSecret.

 ## Custom datatypes:
   |Datatype|Description|Example
   |--------|-----------|----------
   |Datepicker|String which includes date and time|```2016-05-28 00:00:00```
   |Map|String which includes latitude and longitude coma separated|```50.37, 26.56```
   |List|Simple array|```["123", "sample"]```
   |Select|String with predefined values|```sample```
   |Array|Array of objects|```[{"Second name":"123","Age":"12","Photo":"sdf","Draft":"sdfsdf"},{"name":"adi","Second name":"bla","Age":"4","Photo":"asfserwe","Draft":"sdfsdf"}] ``` 

## Todoist.getAccessToken
Exchanging authorization codes for access token.

| Field       | Type       | Description
|-------------|------------|----------
| clientId    | credentials| The unique Client ID of the Todoist application that you registered.
| clientSecret| credentials| The unique Client Secret of the Todoist application that you registered.
| code        | String     | The unique string code that you obtained in the authorization request.
| redirectUri | String     | The URL to which to send the response to this request.

## Todoist.revokeAccessToken
Access tokens obtained via OAuth could be revoke.

| Field       | Type       | Description
|-------------|------------|----------
| clientId    | credentials| The unique Client ID of the Todoist application that you registered.
| clientSecret| credentials| The unique Client Secret of the Todoist application that you registered.
| accessToken | String     | Access token obtained from the OAuth authentication.

## Todoist.exchangeApiToken
Tokens obtained via the old email/password authentication method could be migrated to the new OAuth access token.

| Field       | Type       | Description
|-------------|------------|----------
| clientId    | credentials| The unique Client ID of the Todoist application that you registered.
| clientSecret| credentials| The unique Client Secret of the Todoist application that you registered.
| apiToken    | String     | Token obtained from the email/password authentication.
| scope       | List       | Scopes of the OAuth token. Please refer to the OAuth section for the detailed list of available scopes.Select options - task:add, data:read, data:read_write, data:delete, project:delete.

## Todoist.crossOriginResourceSharing
All API endpoints not related to the 3 OAuth steps support Cross Origin Resource Sharing (CORS) for requests from any origin.

| Field   | Type       | Description
|---------|------------|----------
| accessToken | String| Access token obtained from the OAuth authentication.
| origin  | String     | Cross Origin Resource Sharing (CORS) 

## Todoist.readResources
Tokens obtained via the old email/password authentication method could be migrated to the new OAuth access token.

| Field        | Type       | Description
|--------------|------------|----------
| accessToken | String| Access token obtained from the OAuth authentication.
| syncToken    | String     | A special string, used to allow the client to perform incremental sync. Pass * to retrieve all active resource data.
| resourceTypes| List       | Used to specify what resources to fetch from the server.Select options - "labels", "projects", "items", "notes", "filters", "reminders", "locations", "user", "live_notifications", "collaborators", "notification_settings", "all".

## Todoist.createProject
Create project.

| Field   | Type       | Description
|---------|------------|----------
| accessToken | String| Access token obtained from the OAuth authentication.
| commands| Array      | Array of Command object. Each command will be processed in the specified order.
|commands.tempId | String | The temporary resource ID feature allows you to run two or more dependent commands in a single HTTP request. For commands that are related to creation of resources (i.e. createItem, createProject), you can specify an extra tempId as a placeholder for the actual ID of the resource. The other commands in the same sequence could directly refer to tempId if needed.
|commands.uuid| String | API clients should generate a unique string ID for each command and specify it in the uuid field. The Command UUID will be used for two purposes: 1.Command result mapping: Each command’s result will be stored in the sync_status field of the response JSON object. The sync_status object has its key mapped to a command’s uuid and its value containing the result of a command.2.Command idempotency: Todoist will not execute command that has same UUID as the previously executed commands. This will allow clients to safely retry each command without accidentally performing the command twice.
|commands.name| String | The name of the project (a string value).
|commands.color| Number | The color of the project (a number between 0 and 11, or between 0 and 21 for premium users).
|commands.indent| Number | The indent of the item (a number between 1 and 4, where 1 is top-level).
|commands.itemOrder| Number | Project’s order in the project list (a number, where the smallest value should place the project at the top).

## Todoist.updateProject
Update an existing project.

| Field   | Type       | Description
|---------|------------|----------
| accessToken | String| Access token obtained from the OAuth authentication.
| commands| Array      | Array of Command object. Each command will be processed in the specified order.
|commands.tempId | String | The temporary resource ID feature allows you to run two or more dependent commands in a single HTTP request. For commands that are related to creation of resources (i.e. createItem, createProject), you can specify an extra tempId as a placeholder for the actual ID of the resource. The other commands in the same sequence could directly refer to tempId if needed.
|commands.uuid| String | API clients should generate a unique string ID for each command and specify it in the uuid field. The Command UUID will be used for two purposes: 1.Command result mapping: Each command’s result will be stored in the sync_status field of the response JSON object. The sync_status object has its key mapped to a command’s uuid and its value containing the result of a command.2.Command idempotency: Todoist will not execute command that has same UUID as the previously executed commands. This will allow clients to safely retry each command without accidentally performing the command twice.
|commands.name| String | The name of the project (a string value).
|commands.color| Number | The color of the project (a number between 0 and 11, or between 0 and 21 for premium users).
|commands.indent| Number | The indent of the item (a number between 1 and 4, where 1 is top-level).
|commands.itemOrder| Number | Project’s order in the project list (a number, where the smallest value should place the project at the top).
|commands.collapsed| Select | Whether the project’s sub-projects are collapsed (where 1 is true and 0 is false).Options - true,false.
## Todoist.deleteProject
Delete an existing project.

| Field   | Type       | Description
|---------|------------|----------
| accessToken | String| Access token obtained from the OAuth authentication.
| ids     | List       | List of the ids of the projects to delete (could be temp ids).
|uuid| String | API clients should generate a unique string ID for each command and specify it in the uuid field. The Command UUID will be used for two purposes: 1.Command result mapping: Each command’s result will be stored in the sync_status field of the response JSON object. The sync_status object has its key mapped to a command’s uuid and its value containing the result of a command.2.Command idempotency: Todoist will not execute command that has same UUID as the previously executed commands. This will allow clients to safely retry each command without accidentally performing the command twice.

## Todoist.archiveProject
Archive project and its children.

| Field   | Type       | Description
|---------|------------|----------
| accessToken | String| Access token obtained from the OAuth authentication.
| ids     | List       | List of the ids of the projects to delete (could be temp ids).
| uuid    | String     | API clients should generate a unique string ID for each command and specify it in the uuid field. The Command UUID will be used for two purposes: 1.Command result mapping: Each command’s result will be stored in the sync_status field of the response JSON object. The sync_status object has its key mapped to a command’s uuid and its value containing the result of a command.2.Command idempotency: Todoist will not execute command that has same UUID as the previously executed commands. This will allow clients to safely retry each command without accidentally performing the command twice.

## Todoist.unarchiveProject
Unarchive project and its children.

| Field   | Type       | Description
|---------|------------|----------
| accessToken | String| Access token obtained from the OAuth authentication.
| ids     | List       | List of the ids of the projects to delete (could be temp ids).
| uuid    | String     | API clients should generate a unique string ID for each command and specify it in the uuid field. The Command UUID will be used for two purposes: 1.Command result mapping: Each command’s result will be stored in the sync_status field of the response JSON object. The sync_status object has its key mapped to a command’s uuid and its value containing the result of a command.2.Command idempotency: Todoist will not execute command that has same UUID as the previously executed commands. This will allow clients to safely retry each command without accidentally performing the command twice.

## Todoist.updateMultipleOrdersAndIndents
Update the orders and indents of multiple projects at once.

| Field             | Type       | Description
|-------------------|------------|----------
| accessToken | String| Access token obtained from the OAuth authentication.
| uuid    | String     | API clients should generate a unique string ID for each command and specify it in the uuid field. The Command UUID will be used for two purposes: 1.Command result mapping: Each command’s result will be stored in the sync_status field of the response JSON object. The sync_status object has its key mapped to a command’s uuid and its value containing the result of a command.2.Command idempotency: Todoist will not execute command that has same UUID as the previously executed commands. This will allow clients to safely retry each command without accidentally performing the command twice.
| idsToOrdersIndents| Array      | A dictionary array, with a project id as key and a two elements list as value: project_id: item_order, indent.

## Todoist.createItem
Add a new task to a project.

| Field   | Type       | Description
|---------|------------|----------
| accessToken | String| Access token obtained from the OAuth authentication.
| commands| Array      | Array of Command object. Each command will be processed in the specified order.
|commands.tempId | String | The temporary resource ID feature allows you to run two or more dependent commands in a single HTTP request. For commands that are related to creation of resources (i.e. createItem, createProject), you can specify an extra tempId as a placeholder for the actual ID of the resource. The other commands in the same sequence could directly refer to tempId if needed.
|commands.uuid| String | API clients should generate a unique string ID for each command and specify it in the uuid field. The Command UUID will be used for two purposes: 1.Command result mapping: Each command’s result will be stored in the sync_status field of the response JSON object. The sync_status object has its key mapped to a command’s uuid and its value containing the result of a command.2.Command idempotency: Todoist will not execute command that has same UUID as the previously executed commands. This will allow clients to safely retry each command without accidentally performing the command twice.
| commands.content| String      | 	The text of the task.
| commands.projectId| String      | The id of the project to add the task to (a number or a temp id). By default the task is added to the user’s Inbox project.
| commands.dateString| String      | The date of the task, added in free form text, for example it can be every day @ 10 (or null or an empty string to unset). Look at our reference to see [which formats are supported](https://support.todoist.com/hc/en-us/articles/205325931-Due-Dates-Times).
| commands.dateLang| Select      | The language of the dateString. Options - en, da, pl, zh, ko, de, pt, ja, it, fr, sv, ru, es, nl.
| commands.dueDateUtc| DatePicker      | Note that, when the dueDateUtc argument is specified, the date_string is required and has to specified as well, and also, the date_string argument will be parsed as local timestamp, and converted to UTC internally, according to the user’s profile settings.
| commands.priority| Select      | The priority of the task (a number between 1 and 4, 4 for very urgent and 1 for natural).  Keep in mind that very urgent is the priority 1 on clients. So, p1 will return 4 in the API.
| commands.indent| Number      | The indent of the task (a number between 1 and 4, where 1 is top-level).
| commands.itemOrder| Number     | The order of the task inside a project (a number, where the smallest value would place the task at the top).
| commands.dayOrder| Number     | The order of the task inside the Today or Next 7 days view (a number, where the smallest value would place the task at the top).
| commands.collapsed| Select     | Whether the task’s sub-tasks are collapsed (where 1 is true and 0 is false).Options - true,false.
| commands.labels| List   |	The tasks labels (a list of label ids such as (2324,2525)).
| commands.assignedByUid| Number      | The id of user who assigns the current task. This makes sense for shared projects only. Accepts 0 or any user id from the list of project collaborators. If this value is unset or invalid, it will be automatically setup to your uid.
| commands.responsibleUid | Number      | 	The id of user who is responsible for accomplishing the current task. This makes sense for shared projects only. Accepts any user id from the list of project collaborators or null or an empty string to unset.
| commands.autoReminder| Select      | When this option is enabled, the default reminder will be added to the new item if it has a due date with time set.


## Todoist.updateItem
Updates an item for the user related to the API credentials.

| Field   | Type       | Description
|---------|------------|----------
| accessToken | String| Access token obtained from the OAuth authentication.
| commands| Array      | Array of Command object. Each command will be processed in the specified order.
|commands.tempId | String | The temporary resource ID feature allows you to run two or more dependent commands in a single HTTP request. For commands that are related to creation of resources (i.e. createItem, createProject), you can specify an extra tempId as a placeholder for the actual ID of the resource. The other commands in the same sequence could directly refer to tempId if needed.
|commands.uuid| String | API clients should generate a unique string ID for each command and specify it in the uuid field. The Command UUID will be used for two purposes: 1.Command result mapping: Each command’s result will be stored in the sync_status field of the response JSON object. The sync_status object has its key mapped to a command’s uuid and its value containing the result of a command.2.Command idempotency: Todoist will not execute command that has same UUID as the previously executed commands. This will allow clients to safely retry each command without accidentally performing the command twice.
| commands.id| String      | The id of the task.
| commands.content| String      | 	The text of the task.
| commands.projectId| String      | The id of the project to add the task to (a number or a temp id). By default the task is added to the user’s Inbox project.
| commands.dateString| String      | The date of the task, added in free form text, for example it can be every day @ 10 (or null or an empty string to unset). Look at our reference to see [which formats are supported](https://support.todoist.com/hc/en-us/articles/205325931-Due-Dates-Times).
| commands.dateLang| Select      | The language of the dateString. Options - en, da, pl, zh, ko, de, pt, ja, it, fr, sv, ru, es, nl.
| commands.dueDateUtc| DatePicker      | Note that, when the dueDateUtc argument is specified, the date_string is required and has to specified as well, and also, the date_string argument will be parsed as local timestamp, and converted to UTC internally, according to the user’s profile settings.
| commands.priority| Select      | The priority of the task (a number between 1 and 4, 4 for very urgent and 1 for natural).  Keep in mind that very urgent is the priority 1 on clients. So, p1 will return 4 in the API.
| commands.indent| Number      | The indent of the task (a number between 1 and 4, where 1 is top-level).
| commands.itemOrder| Number     | The order of the task inside a project (a number, where the smallest value would place the task at the top).
| commands.dayOrder| Number     | The order of the task inside the Today or Next 7 days view (a number, where the smallest value would place the task at the top).
| commands.collapsed| Select     | Whether the task’s sub-tasks are collapsed (where 1 is true and 0 is false).Options - true,false.
| commands.labels| List   |	The tasks labels (a list of label ids such as (2324,2525)).
| commands.assignedByUid| Number      | The id of user who assigns the current task. This makes sense for shared projects only. Accepts 0 or any user id from the list of project collaborators. If this value is unset or invalid, it will be automatically setup to your uid.
| commands.responsibleUid | Number      | 	The id of user who is responsible for accomplishing the current task. This makes sense for shared projects only. Accepts any user id from the list of project collaborators or null or an empty string to unset.

## Todoist.deleteItem
Delete an existing task.

| Field   | Type       | Description
|---------|------------|----------
| accessToken | String| Access token obtained from the OAuth authentication.
|uuid| String | API clients should generate a unique string ID for each command and specify it in the uuid field. The Command UUID will be used for two purposes: 1.Command result mapping: Each command’s result will be stored in the sync_status field of the response JSON object. The sync_status object has its key mapped to a command’s uuid and its value containing the result of a command.2.Command idempotency: Todoist will not execute command that has same UUID as the previously executed commands. This will allow clients to safely retry each command without accidentally performing the command twice.
| itemIds | List       | List of the ids of the projects to delete (could be temp ids).

## Todoist.moveItem
Move a task from one project to another project.

| Field   | Type       | Description
|---------|------------|----------
| accessToken | String| Access token obtained from the OAuth authentication.
| commands| Array      | Array of Command object. Each command will be processed in the specified order.
|commands.uuid| String | API clients should generate a unique string ID for each command and specify it in the uuid field. The Command UUID will be used for two purposes: 1.Command result mapping: Each command’s result will be stored in the sync_status field of the response JSON object. The sync_status object has its key mapped to a command’s uuid and its value containing the result of a command.2.Command idempotency: Todoist will not execute command that has same UUID as the previously executed commands. This will allow clients to safely retry each command without accidentally performing the command twice.
| commands.projectItems| JSON      | A JSON mapping telling Todoist where the items are currently found. From project ids to item ids, for example ```{"1523":["9637423"]}```, where 1523 is the project id and 9637423 is the item id.
| commands.toProject| Number     | 	The project id that the tasks should be moved to, for example 1245.


## Todoist.completeItems
Complete tasks and optionally move them to history. See also itemClose for a simplified version of the command.

| Field       | Type       | Description
|-------------|------------|----------
| accessToken | String| Access token obtained from the OAuth authentication.
|uuid| String | API clients should generate a unique string ID for each command and specify it in the uuid field. The Command UUID will be used for two purposes: 1.Command result mapping: Each command’s result will be stored in the sync_status field of the response JSON object. The sync_status object has its key mapped to a command’s uuid and its value containing the result of a command.2.Command idempotency: Todoist will not execute command that has same UUID as the previously executed commands. This will allow clients to safely retry each command without accidentally performing the command twice.
| itemIds     | List       | A list of ids to complete (numbers or temp ids).
| forceHistory| Select     | Whether these tasks should be moved to history (where 1 is true and 0 is false, and the default is 1) This is useful when checking off sub tasks.Options - true,false.

## Todoist.uncompleteItems
Uncomplete tasks and move them to the active projects.

| Field       | Type       | Description
|-------------|------------|----------
| accessToken | String| Access token obtained from the OAuth authentication.
|uuid| String | API clients should generate a unique string ID for each command and specify it in the uuid field. The Command UUID will be used for two purposes: 1.Command result mapping: Each command’s result will be stored in the sync_status field of the response JSON object. The sync_status object has its key mapped to a command’s uuid and its value containing the result of a command.2.Command idempotency: Todoist will not execute command that has same UUID as the previously executed commands. This will allow clients to safely retry each command without accidentally performing the command twice.
| itemIds     | List       | A list of items to uncomplete.
| restoreState| JSON       | A dictionary object, where the item id is the key, and its value is a list of four elements, whether the item is in history, whether it is checked, its order and indent - ```item_id: [in_history, checked, item_order, indent]```.

## Todoist.completeRecurringTask
Complete a recurring task, and the reason why this is a special case is because we need to mark a recurring completion (and using itemUpdate won’t do this). See also item_close for a simplified version of the command.

| Field   | Type       | Description
|---------|------------|----------
| accessToken | String| Access token obtained from the OAuth authentication.
| commands| Array      | Array of Command object. Each command will be processed in the specified order.
| commands.id| String      | The id of the item to update (a number or a temp id).
| commands.newDateUtc| DatePicker      | Note that, when the newDateUtc argument is specified, the date_string is required and has to specified as well, and also, the date_string argument will be parsed as local timestamp, and converted to UTC internally, according to the user’s profile settings.
| commands.dateString| String      | The date of the task, added in free form text, for example it can be every day @ 10 (or null or an empty string to unset). Look at our reference to see [which formats are supported](https://support.todoist.com/hc/en-us/articles/205325931-Due-Dates-Times).
| commands.isForward| Select      | Whether the task is to be completed (value 1) or uncompleted (value 0), while the default is 1.Options - true,false.

## Todoist.closeItem
A simplified version of itemComplete . The command does exactly what official clients do when you close a task: regular task is completed and moved to history, subtask is checked (marked as done, but not moved to history), recurring task is moved forward (due date is updated).

| Field   | Type       | Description
|---------|------------|----------
| accessToken | String| Access token obtained from the OAuth authentication.
| commands| Array      | Array of Command object. Each command will be processed in the specified order.
|commands.uuid| String | API clients should generate a unique string ID for each command and specify it in the uuid field. The Command UUID will be used for two purposes: 1.Command result mapping: Each command’s result will be stored in the sync_status field of the response JSON object. The sync_status object has its key mapped to a command’s uuid and its value containing the result of a command.2.Command idempotency: Todoist will not execute command that has same UUID as the previously executed commands. This will allow clients to safely retry each command without accidentally performing the command twice.
| commands.id| String      | 	The id of the item to close (a number or a temp id).


## Todoist.updateDayOrders
Update the day orders of multiple items at once.

| Field   | Type       | Description
|---------|------------|----------
| accessToken | String| Access token obtained from the OAuth authentication.
| commands| Array      | Array of Command object. Each command will be processed in the specified order.
|commands.uuid| String | API clients should generate a unique string ID for each command and specify it in the uuid field. The Command UUID will be used for two purposes: 1.Command result mapping: Each command’s result will be stored in the sync_status field of the response JSON object. The sync_status object has its key mapped to a command’s uuid and its value containing the result of a command.2.Command idempotency: Todoist will not execute command that has same UUID as the previously executed commands. This will allow clients to safely retry each command without accidentally performing the command twice.
| commands.dayOrder| Number      | The order of the task inside the Today or Next 7 days view (a number, where the smallest value would place the task at the top).
| commands.itemId| String      | The item which the note is part of (a unique number or temp id).


## Todoist.createLabel
Create a label.

| Field   | Type       | Description
|---------|------------|----------
| accessToken | String| Access token obtained from the OAuth authentication.
| commands| Array      | Array of Command object. Each command will be processed in the specified order.
|commands.tempId | String | The temporary resource ID feature allows you to run two or more dependent commands in a single HTTP request. For commands that are related to creation of resources (i.e. createItem, createProject), you can specify an extra tempId as a placeholder for the actual ID of the resource. The other commands in the same sequence could directly refer to tempId if needed.
|commands.uuid| String | API clients should generate a unique string ID for each command and specify it in the uuid field. The Command UUID will be used for two purposes: 1.Command result mapping: Each command’s result will be stored in the sync_status field of the response JSON object. The sync_status object has its key mapped to a command’s uuid and its value containing the result of a command.2.Command idempotency: Todoist will not execute command that has same UUID as the previously executed commands. This will allow clients to safely retry each command without accidentally performing the command twice.
| commands.name| String      | The name of the label.
| commands.color| Number      | The color of the label (a number between 0 and 7, or between 0 and 12 for premium users).
| commands.itemOrder| Number      | Label’s order in the label list (a number, where the smallest value should place the label at the top).

## Todoist.updateLabel
Update a label.

| Field   | Type       | Description
|---------|------------|----------
| accessToken | String| Access token obtained from the OAuth authentication.
| commands| Array      | Array of Command object. Each command will be processed in the specified order.
|commands.tempId | String | The temporary resource ID feature allows you to run two or more dependent commands in a single HTTP request. For commands that are related to creation of resources (i.e. createItem, createProject), you can specify an extra tempId as a placeholder for the actual ID of the resource. The other commands in the same sequence could directly refer to tempId if needed.
|commands.uuid| String | API clients should generate a unique string ID for each command and specify it in the uuid field. The Command UUID will be used for two purposes: 1.Command result mapping: Each command’s result will be stored in the sync_status field of the response JSON object. The sync_status object has its key mapped to a command’s uuid and its value containing the result of a command.2.Command idempotency: Todoist will not execute command that has same UUID as the previously executed commands. This will allow clients to safely retry each command without accidentally performing the command twice.
| commands.name| String      | The name of the label.
| commands.color| Number      | The color of the label (a number between 0 and 7, or between 0 and 12 for premium users).
| commands.itemOrder| Number      | Label’s order in the label list (a number, where the smallest value should place the label at the top).

## Todoist.deleteLabel
Update a label.

| Field   | Type       | Description
|---------|------------|----------
| accessToken | String| Access token obtained from the OAuth authentication.
| commands| Array      | Array of Command object. Each command will be processed in the specified order.
|commands.uuid| String | API clients should generate a unique string ID for each command and specify it in the uuid field. The Command UUID will be used for two purposes: 1.Command result mapping: Each command’s result will be stored in the sync_status field of the response JSON object. The sync_status object has its key mapped to a command’s uuid and its value containing the result of a command.2.Command idempotency: Todoist will not execute command that has same UUID as the previously executed commands. This will allow clients to safely retry each command without accidentally performing the command twice.
| commands.id| String      | The id of the label.

## Todoist.updateMultipleOrders
A dictionary, where a label id is the key, and the order its value: labelId : order.

| Field         | Type       | Description
|---------------|------------|----------
| accessToken | String| Access token obtained from the OAuth authentication.
|uuid| String | API clients should generate a unique string ID for each command and specify it in the uuid field. The Command UUID will be used for two purposes: 1.Command result mapping: Each command’s result will be stored in the sync_status field of the response JSON object. The sync_status object has its key mapped to a command’s uuid and its value containing the result of a command.2.Command idempotency: Todoist will not execute command that has same UUID as the previously executed commands. This will allow clients to safely retry each command without accidentally performing the command twice.
| idOrderMapping| Array      | A dictionary, where a label id is the key, and the order its value: label_id: order.

## Todoist.createNote
Add a note.Is only available for Todoist Premium.

| Field   | Type       | Description
|---------|------------|----------
| accessToken | String| Access token obtained from the OAuth authentication.
| commands| Array      | Array of Command object. Each command will be processed in the specified order.
|commands.tempId | String | The temporary resource ID feature allows you to run two or more dependent commands in a single HTTP request. For commands that are related to creation of resources (i.e. createItem, createProject), you can specify an extra tempId as a placeholder for the actual ID of the resource. The other commands in the same sequence could directly refer to tempId if needed.
|commands.uuid| String | API clients should generate a unique string ID for each command and specify it in the uuid field. The Command UUID will be used for two purposes: 1.Command result mapping: Each command’s result will be stored in the sync_status field of the response JSON object. The sync_status object has its key mapped to a command’s uuid and its value containing the result of a command.2.Command idempotency: Todoist will not execute command that has same UUID as the previously executed commands. This will allow clients to safely retry each command without accidentally performing the command twice.
| commands.itemId| String      | The item which the note is part of (a unique number or temp id).
| commands.content| String     | The content of the note (a string value).
| commands.fileAttachment| JSON      | A file attached to the note (see more details about attachments above, and learn how to upload a file in the [Uploads section](https://developer.todoist.com/sync/v7/#uploads)).
| commands.uidsToNotify| List    | A list of user ids to notify.

## Todoist.createProjectNote
Add a project note.Is only available for Todoist Premium.

| Field   | Type       | Description
|---------|------------|----------
| accessToken | String| Access token obtained from the OAuth authentication.
| commands| Array      | Array of Command object. Each command will be processed in the specified order.
|commands.tempId | String | The temporary resource ID feature allows you to run two or more dependent commands in a single HTTP request. For commands that are related to creation of resources (i.e. createItem, createProject), you can specify an extra tempId as a placeholder for the actual ID of the resource. The other commands in the same sequence could directly refer to tempId if needed.
|commands.uuid| String | API clients should generate a unique string ID for each command and specify it in the uuid field. The Command UUID will be used for two purposes: 1.Command result mapping: Each command’s result will be stored in the sync_status field of the response JSON object. The sync_status object has its key mapped to a command’s uuid and its value containing the result of a command.2.Command idempotency: Todoist will not execute command that has same UUID as the previously executed commands. This will allow clients to safely retry each command without accidentally performing the command twice.
| commands.projectId| String      | The project which the note is part of (a unique number or temp id).
| commands.content| String     | The content of the note (a string value).
| commands.fileAttachment| JSON      | A file attached to the note (see more details about attachments above, and learn how to upload a file in the [Uploads section](https://developer.todoist.com/sync/v7/#uploads)).

## Todoist.updateNote
Update a note.Is only available for Todoist Premium.

| Field   | Type       | Description
|---------|------------|----------
| accessToken | String| Access token obtained from the OAuth authentication.
| commands| Array      | Array of Command object. Each command will be processed in the specified order.
|commands.uuid| String | API clients should generate a unique string ID for each command and specify it in the uuid field. The Command UUID will be used for two purposes: 1.Command result mapping: Each command’s result will be stored in the sync_status field of the response JSON object. The sync_status object has its key mapped to a command’s uuid and its value containing the result of a command.2.Command idempotency: Todoist will not execute command that has same UUID as the previously executed commands. This will allow clients to safely retry each command without accidentally performing the command twice.
| commands.id| String      | The id of the note.
| commands.content| String     | The content of the note (a string value).
| commands.fileAttachment| JSON      | A file attached to the note (see more details about attachments above, and learn how to upload a file in the [Uploads section](https://developer.todoist.com/sync/v7/#uploads)).

## Todoist.deleteNote
Delete a note.Is only available for Todoist Premium.

| Field   | Type       | Description
|---------|------------|----------
| accessToken | String| Access token obtained from the OAuth authentication.
| commands| Array      | Array of Command object. Each command will be processed in the specified order.
|commands.uuid| String | API clients should generate a unique string ID for each command and specify it in the uuid field. The Command UUID will be used for two purposes: 1.Command result mapping: Each command’s result will be stored in the sync_status field of the response JSON object. The sync_status object has its key mapped to a command’s uuid and its value containing the result of a command.2.Command idempotency: Todoist will not execute command that has same UUID as the previously executed commands. This will allow clients to safely retry each command without accidentally performing the command twice.
| commands.id| String      | The id of the note.

## Todoist.createFilter
Add a filter.

| Field   | Type       | Description
|---------|------------|----------
| accessToken | String| Access token obtained from the OAuth authentication.
| commands| Array      | Array of Command object. Each command will be processed in the specified order.
|commands.tempId | String | The temporary resource ID feature allows you to run two or more dependent commands in a single HTTP request. For commands that are related to creation of resources (i.e. createItem, createProject), you can specify an extra tempId as a placeholder for the actual ID of the resource. The other commands in the same sequence could directly refer to tempId if needed.
|commands.uuid| String | API clients should generate a unique string ID for each command and specify it in the uuid field. The Command UUID will be used for two purposes: 1.Command result mapping: Each command’s result will be stored in the sync_status field of the response JSON object. The sync_status object has its key mapped to a command’s uuid and its value containing the result of a command.2.Command idempotency: Todoist will not execute command that has same UUID as the previously executed commands. This will allow clients to safely retry each command without accidentally performing the command twice.
| commands.name| String      | The name of the filter.
| commands.query| String      | 	The query to search for. [Examples of searches](https://support.todoist.com/hc/en-us/articles/205248842-Filters) can be found in the Todoist help page.
|commands.color| Number | The color of the project (a number between 0 and 11, or between 0 and 21 for premium users).
|commands.itemOrder| Number | Filters order in the filter list (a number, where the smallest value should place the project at the top).


## Todoist.updateFilter
Update a filter.

| Field   | Type       | Description
|---------|------------|----------
| accessToken | String| Access token obtained from the OAuth authentication.
| commands| Array      | Array of Command object. Each command will be processed in the specified order.
|commands.uuid| String | API clients should generate a unique string ID for each command and specify it in the uuid field. The Command UUID will be used for two purposes: 1.Command result mapping: Each command’s result will be stored in the sync_status field of the response JSON object. The sync_status object has its key mapped to a command’s uuid and its value containing the result of a command.2.Command idempotency: Todoist will not execute command that has same UUID as the previously executed commands. This will allow clients to safely retry each command without accidentally performing the command twice.
| commands.id| String      | The id of the filter.
| commands.name| String      | The name of the filter.
| commands.query| String      | 	The query to search for. [Examples of searches](https://support.todoist.com/hc/en-us/articles/205248842-Filters) can be found in the Todoist help page.
|commands.color| Number | The color of the project (a number between 0 and 11, or between 0 and 21 for premium users).
|commands.itemOrder| Number | Filters order in the filter list (a number, where the smallest value should place the project at the top).

## Todoist.deleteFilter
Delete a filter.

| Field   | Type       | Description
|---------|------------|----------
| accessToken | String| Access token obtained from the OAuth authentication.
| commands| Array      | Array of Command object. Each command will be processed in the specified order.
|commands.uuid| String | API clients should generate a unique string ID for each command and specify it in the uuid field. The Command UUID will be used for two purposes: 1.Command result mapping: Each command’s result will be stored in the sync_status field of the response JSON object. The sync_status object has its key mapped to a command’s uuid and its value containing the result of a command.2.Command idempotency: Todoist will not execute command that has same UUID as the previously executed commands. This will allow clients to safely retry each command without accidentally performing the command twice.
| commands.id| String      | The id of the filter.

## Todoist.createReminder
Add a new reminder to the user account related to the API credentials.Is only available for Todoist Premium.

| Field   | Type       | Description
|---------|------------|----------
| accessToken | String| Access token obtained from the OAuth authentication.
| commands| Array      | Array of Command object. Each command will be processed in the specified order.
|commands.tempId | String | The temporary resource ID feature allows you to run two or more dependent commands in a single HTTP request. For commands that are related to creation of resources (i.e. createItem, createProject), you can specify an extra tempId as a placeholder for the actual ID of the resource. The other commands in the same sequence could directly refer to tempId if needed.
|commands.uuid| String | API clients should generate a unique string ID for each command and specify it in the uuid field. The Command UUID will be used for two purposes: 1.Command result mapping: Each command’s result will be stored in the sync_status field of the response JSON object. The sync_status object has its key mapped to a command’s uuid and its value containing the result of a command.2.Command idempotency: Todoist will not execute command that has same UUID as the previously executed commands. This will allow clients to safely retry each command without accidentally performing the command twice.
| commands.itemId| String      | The item id for which the reminder is about.
| commands.type| Select      | 	The type of the reminder: relative for a time-based reminder specified in minutes from now, absolute for a time-based reminder with a specific time and date in the future, and location for a location-based reminder.
| commands.notifyUid| Number     | 	The user id which should be notified of the reminder, typically the current user id creating the reminder.
| commands.service| Select      | The way to get notified of the reminder: email for e-mail, mobile for mobile text message, or push for mobile push notification.
| commands.dateString| String      | The date of the task, added in free form text, for example it can be every day @ 10 (or null or an empty string to unset). Look at our reference to see [which formats are supported](https://support.todoist.com/hc/en-us/articles/205325931-Due-Dates-Times).
| commands.dateLang| Select      | The language of the dateString. Options - en, da, pl, zh, ko, de, pt, ja, it, fr, sv, ru, es, nl.
| commands.dueDateUtc| DatePicker      | Note that, when the dueDateUtc argument is specified, the date_string is required and has to specified as well, and also, the date_string argument will be parsed as local timestamp, and converted to UTC internally, according to the user’s profile settings.
| commands.minuteOffset| Number     | The relative time in minutes before the due date of the item, in which the reminder should be triggered. Note, that the item should have a due date set in order to add a relative reminder.
| commands.name| String     |	An alias name for the location.
| commands.coordinates| Map      |	Location longitude and location latitude.
| commands.locTrigger| String     | 	What should trigger the reminder: on_enter for entering the location, or on_leave for leaving the location.
| commands.radius| Number     | 	The radius around the location that is still considered as part of the location (in meters).


## Todoist.updateReminder
Update a reminder from the user account related to the API credentials.Is only available for Todoist Premium.

| Field   | Type       | Description
|---------|------------|----------
| accessToken | String| Access token obtained from the OAuth authentication.
| commands| Array      | Array of Command object. Each command will be processed in the specified order.
|commands.uuid| String | API clients should generate a unique string ID for each command and specify it in the uuid field. The Command UUID will be used for two purposes: 1.Command result mapping: Each command’s result will be stored in the sync_status field of the response JSON object. The sync_status object has its key mapped to a command’s uuid and its value containing the result of a command.2.Command idempotency: Todoist will not execute command that has same UUID as the previously executed commands. This will allow clients to safely retry each command without accidentally performing the command twice.
| commands.id| String      | 	The id of the reminder.
| commands.type| Select      | 	The type of the reminder: relative for a time-based reminder specified in minutes from now, absolute for a time-based reminder with a specific time and date in the future, and location for a location-based reminder.
| commands.notifyUid| Number     | 	The user id which should be notified of the reminder, typically the current user id creating the reminder.
| commands.service| Select      | The way to get notified of the reminder: email for e-mail, mobile for mobile text message, or push for mobile push notification.
| commands.dateString| String      | The date of the task, added in free form text, for example it can be every day @ 10 (or null or an empty string to unset). Look at our reference to see [which formats are supported](https://support.todoist.com/hc/en-us/articles/205325931-Due-Dates-Times).
| commands.dateLang| Select      | The language of the dateString. Options - en, da, pl, zh, ko, de, pt, ja, it, fr, sv, ru, es, nl.
| commands.dueDateUtc| DatePicker      | Note that, when the dueDateUtc argument is specified, the date_string is required and has to specified as well, and also, the date_string argument will be parsed as local timestamp, and converted to UTC internally, according to the user’s profile settings.
| commands.minuteOffset| Number     | The relative time in minutes before the due date of the item, in which the reminder should be triggered. Note, that the item should have a due date set in order to add a relative reminder.
| commands.name| String     |	An alias name for the location.
| commands.coordinates| Map      |	Location longitude and location latitude.
| commands.locTrigger| String     | 	What should trigger the reminder: on_enter for entering the location, or on_leave for leaving the location.
| commands.radius| Number      | 	The radius around the location that is still considered as part of the location (in meters).

## Todoist.deleteReminder
Delete a reminder from the user account related to the API credentials.Is only available for Todoist Premium.

| Field   | Type       | Description
|---------|------------|----------
| accessToken | String| Access token obtained from the OAuth authentication.
| commands| Array      | Array of Command object. Each command will be processed in the specified order.
|commands.uuid| String | API clients should generate a unique string ID for each command and specify it in the uuid field. The Command UUID will be used for two purposes: 1.Command result mapping: Each command’s result will be stored in the sync_status field of the response JSON object. The sync_status object has its key mapped to a command’s uuid and its value containing the result of a command.2.Command idempotency: Todoist will not execute command that has same UUID as the previously executed commands. This will allow clients to safely retry each command without accidentally performing the command twice.
| commands.id| String      | The id of the reminder.

## Todoist.clearLocations
Clears the locations list, which is used for the location reminders.Is only available for Todoist Premium.

| Field   | Type       | Description
|---------|------------|----------
| accessToken | String| Access token obtained from the OAuth authentication.
| commands| Array      | Array of Command object. Each command will be processed in the specified order.
|commands.uuid| String | API clients should generate a unique string ID for each command and specify it in the uuid field. The Command UUID will be used for two purposes: 1.Command result mapping: Each command’s result will be stored in the sync_status field of the response JSON object. The sync_status object has its key mapped to a command’s uuid and its value containing the result of a command.2.Command idempotency: Todoist will not execute command that has same UUID as the previously executed commands. This will allow clients to safely retry each command without accidentally performing the command twice.

## Todoist.getProductivityStats
Get the user’s productivity stats.

| Field   | Type       | Description
|---------|------------|----------
| accessToken | String| Access token obtained from the OAuth authentication.

## Todoist.getAllCompletedItems
Only available for Todoist Premium users.Get all the user’s completed items (tasks).Is only available for Todoist Premium.

| Field        | Type       | Description
|--------------|------------|----------
| accessToken | String| Access token obtained from the OAuth authentication.
| projectId    | String     | Filter the tasks by project id.
| limit        | Number     | The number of items to return (where the default is 30, and the maximum is 50).
| offset       | Number     | Can be used for pagination, when more than the limit number of tasks are returned.
| until        | DatePicker | Return items with a completed date same or older than until (a string value formatted as 2007-4-29T10:13).
| since        | DatePicker | Return items with a completed date newer than since (a string value formatted as 2007-4-29T10:13).
| annotateNotes| Select     | Return notes together with the completed items (a true or false value).

## Todoist.getArchivedProjects
Get the user’s archived projects.

| Field   | Type       | Description
|---------|------------|----------
| accessToken | String| Access token obtained from the OAuth authentication.

## Todoist.getItemInfo
This function is used to extract detailed information about the item, including all the notes.

| Field   | Type       | Description
|---------|------------|----------
| accessToken | String| Access token obtained from the OAuth authentication.
| itemId  | String     | The item’s unique id.
| allData | Select     | Whether to return the parent project and notes of the item (a true or false value, while the default is true).

## Todoist.getProjectInfo
This function is used to extract detailed information about the project, including all the note

| Field    | Type       | Description
|----------|------------|----------
| accessToken | String| Access token obtained from the OAuth authentication.
| projectId| String     | The project’s unique id.
| allData  | Select     | Whether to return the parent project and notes of the item (a true or false value, while the default is true).

## Todoist.getProjectData
Get a project’s uncompleted items.

| Field    | Type       | Description
|----------|------------|----------
| accessToken | String| Access token obtained from the OAuth authentication.
| projectId| String     | The project’s unique id.

## Todoist.quickAddTask
Add a new task using the Quick Add Task implementation available in the official clients.

| Field   | Type       | Description
|---------|------------|----------
| accessToken | String| Access token obtained from the OAuth authentication.
| text    | String     | The text of the task that is parsed. It can include a due date in free form text, a project name starting with the # character, a label starting with the @ character, and an assignee starting with the + character.
| note    | String     | The content of the note.
| reminder| DatePicker | The date of the reminder, added in free form text.

## Todoist.registerNewUser
Register a new user.

| Field   | Type       | Description
|---------|------------|----------
| accessToken | String| Access token obtained from the OAuth authentication.
| email   | String     | The user’s email.
| fullName| String     | The user’s real name formatted as Firstname Lastname.
| password| String     | The user’s password.
| lang    | Select     | The user’s language.
| timezone| String     | The user’s timezone (a string value such as UTC, Europe/Lisbon, US/Eastern, Asian/Taipei). By default we use the user’s IP address to determine the timezone.

## Todoist.updateUsersProperties
Update user’s properties

| Field   | Type       | Description
|---------|------------|----------
| accessToken | String| Access token obtained from the OAuth authentication.
| commands| Array      | Array of Command object. Each command will be processed in the specified order.
|commands.uuid| String | API clients should generate a unique string ID for each command and specify it in the uuid field. The Command UUID will be used for two purposes: 1.Command result mapping: Each command’s result will be stored in the sync_status field of the response JSON object. The sync_status object has its key mapped to a command’s uuid and its value containing the result of a command.2.Command idempotency: Todoist will not execute command that has same UUID as the previously executed commands. This will allow clients to safely retry each command without accidentally performing the command twice.
| commands.email| String      | 	The user’s email.
| commands.fullName| String      | The user’s real name formatted as Firstname Lastname.
| commands.password| String     | The user’s password.
| commands.timezone| String     | 	The user’s timezone (a string value such as UTC, Europe/Lisbon, US/Eastern, Asian/Taipei).
| commands.startPage| String     |	The user’s default view on Todoist. The start page can be one of the following: _info_page for the info page, _blank for a blank page, _project_<PROJECT_ID> for project with id <PROJECT_ID>, and <ANY_QUERY> to query after anything.
| commands.startDay| Number    | 	The first day of the week (between 1 and 7, where 1 is Monday and 7 is Sunday).
| commands.nextWeek| Number      | Array of Command object. Each command will be processed in the specified order.
| commands.timeFormat| Select     |The day of the next week, that tasks will be postponed to (between 1 and 7, where 1 is Monday and 7 is Sunday).Options - true,false.
| commands.dateFormat| Select      | 	Whether to use the DD-MM-YYYY date format (if set to 0), or the MM-DD-YYYY format (if set to 1).Options - MM-DD-YYYY,DD-MM-YYYY.
| commands.sortOrder| Select     | Whether to show projects in an oldest dates first order (if set to 0, or a oldest dates last order (if set to 1).Options - true,false.
| commands.defaultReminder| String      | The default reminder for the user. Reminders are only possible for Premium users. The default reminder can be one of the following: email to send reminders by email, mobile to send reminders to mobile devices via SMS, push to send reminders to smart devices using push notifications (one of the Android or iOS official clients must be installed on the client side to receive these notifications), no_default to turn off sending default reminders.
| commands.autoReminder| Number     | The default time in minutes for the automatic reminders set, whenever a due date has been specified for a task.
| commands.mobileNumber| String     |	The user’s mobile number (null if not set).
| commands.mobileHost| String     |	The user’s mobile host (or null if not set).
| commands.theme| Number     | 	The currently selected Todoist theme (between 0 and 10).



## Todoist.updateKarmaGoals
Update the karma goals of the user.Is only available for Todoist Premium.

| Field   | Type       | Description
|---------|------------|----------
| accessToken | String| Access token obtained from the OAuth authentication.
| commands| Array      | Array of Command object. Each command will be processed in the specified order.
|commands.uuid| String | API clients should generate a unique string ID for each command and specify it in the uuid field. The Command UUID will be used for two purposes: 1.Command result mapping: Each command’s result will be stored in the syncStatus field of the response JSON object. The syncStatus object has its key mapped to a command’s uuid and its value containing the result of a command.2.Command idempotency: Todoist will not execute command that has same UUID as the previously executed commands. This will allow clients to safely retry each command without accidentally performing the command twice.
| commands.dailyGoal| Number     | The target number of tasks to complete per day.
| commands.weeklyGoal| Number     | The target number of tasks to complete per week.
| commands.ignoreDays| Number     | 	A list with the days of the week to ignore (1 for Monday and 7 for Sunday).
| commands.vacationMode| Select     | 	Marks the user as being on vacation (where 1 is true and 0 is false).Options - true,false.
| commands.karmaDisabled| Select     | 	Whether to disable the karma and goals measuring altogether (where 1 is true and 0 is false).Options - true,false.

## Todoist.updateNotificationSettings
Update the user’s notification settings.Is only available for Todoist Premium.

| Field           | Type       | Description
|-----------------|------------|----------
| accessToken | String| Access token obtained from the OAuth authentication.
| notificationType| List       | The notification type.
| service         | Select     | The service type, which can take the values: email or push.
| dontNotify      | Select     | Whether notifications of this service should be notified (1 to not notify, and 0 to notify).

## Todoist.shareProject
Share a project with another user.

| Field   | Type       | Description
|---------|------------|----------
| accessToken | String| Access token obtained from the OAuth authentication.
| commands| Array      | Array of Command object. Each command will be processed in the specified order.
|commands.tempId | String | The temporary resource ID feature allows you to run two or more dependent commands in a single HTTP request. For commands that are related to creation of resources (i.e. createItem, createProject), you can specify an extra tempId as a placeholder for the actual ID of the resource. The other commands in the same sequence could directly refer to tempId if needed.
|commands.uuid| String | API clients should generate a unique string ID for each command and specify it in the uuid field. The Command UUID will be used for two purposes: 1.Command result mapping: Each command’s result will be stored in the syncStatus field of the response JSON object. The syncStatus object has its key mapped to a command’s uuid and its value containing the result of a command.2.Command idempotency: Todoist will not execute command that has same UUID as the previously executed commands. This will allow clients to safely retry each command without accidentally performing the command twice.
| commands.projectId| String     | 	The project to be shared.
| commands.email| String     | 	The user email with whom to share the project.

## Todoist.deleteCollaborator
Share a project with another user.

| Field   | Type       | Description
|---------|------------|----------
| accessToken | String| Access token obtained from the OAuth authentication.
| commands| Array      | Array of Command object. Each command will be processed in the specified order.
|commands.uuid| String | API clients should generate a unique string ID for each command and specify it in the uuid field. The Command UUID will be used for two purposes: 1.Command result mapping: Each command’s result will be stored in the sync_status field of the response JSON object. The sync_status object has its key mapped to a command’s uuid and its value containing the result of a command.2.Command idempotency: Todoist will not execute command that has same UUID as the previously executed commands. This will allow clients to safely retry each command without accidentally performing the command twice.
| commands.projectId| String     | 	The project to be shared.
| commands.email| String     | 	The user email with whom to share the project.

## Todoist.acceptInvitation
Accept an invitation to join a shared project.

| Field   | Type       | Description
|---------|------------|----------
| accessToken | String| Access token obtained from the OAuth authentication.
| commands| Array      | Array of Command object. Each command will be processed in the specified order.
|commands.uuid| String | API clients should generate a unique string ID for each command and specify it in the uuid field. The Command UUID will be used for two purposes: 1.Command result mapping: Each command’s result will be stored in the sync_status field of the response JSON object. The sync_status object has its key mapped to a command’s uuid and its value containing the result of a command.2.Command idempotency: Todoist will not execute command that has same UUID as the previously executed commands. This will allow clients to safely retry each command without accidentally performing the command twice.
| commands.invitationId| Number      | The invitation id.
| commands.invitationSecret|Number    | The secret fetched from the live notification.

## Todoist.rejectInvitation
Reject an invitation to join a shared project.

| Field   | Type       | Description
|---------|------------|----------
| accessToken | String| Access token obtained from the OAuth authentication.
| commands| Array      | Array of Command object. Each command will be processed in the specified order.
|commands.uuid| String | API clients should generate a unique string ID for each command and specify it in the uuid field. The Command UUID will be used for two purposes: 1.Command result mapping: Each command’s result will be stored in the sync_status field of the response JSON object. The sync_status object has its key mapped to a command’s uuid and its value containing the result of a command.2.Command idempotency: Todoist will not execute command that has same UUID as the previously executed commands. This will allow clients to safely retry each command without accidentally performing the command twice.
| commands.invitationId| Number      | The invitation id.
| commands.invitationSecret|Number    | The secret fetched from the live notification.

## Todoist.deleteInvitation
Delete an invitation to join a shared project.

| Field   | Type       | Description
|---------|------------|----------
| accessToken | String| Access token obtained from the OAuth authentication.
| commands| Array      | Array of Command object. Each command will be processed in the specified order.
|commands.uuid| String | API clients should generate a unique string ID for each command and specify it in the uuid field. The Command UUID will be used for two purposes: 1.Command result mapping: Each command’s result will be stored in the sync_status field of the response JSON object. The sync_status object has its key mapped to a command’s uuid and its value containing the result of a command.2.Command idempotency: Todoist will not execute command that has same UUID as the previously executed commands. This will allow clients to safely retry each command without accidentally performing the command twice.
| commands.invitationId| Number      | The invitation id.

## Todoist.setLastKnown
Set the last known notification.

| Field   | Type       | Description
|---------|------------|----------
| accessToken | String| Access token obtained from the OAuth authentication.
| commands| Array      | Array of Command object. Each command will be processed in the specified order.
|commands.uuid| String | API clients should generate a unique string ID for each command and specify it in the uuid field. The Command UUID will be used for two purposes: 1.Command result mapping: Each command’s result will be stored in the sync_status field of the response JSON object. The sync_status object has its key mapped to a command’s uuid and its value containing the result of a command.2.Command idempotency: Todoist will not execute command that has same UUID as the previously executed commands. This will allow clients to safely retry each command without accidentally performing the command twice.
| commands.id| Number      | 	The id of the last known notification (a number or 0 or null to mark all read).

## Todoist.markAsRead
Mark the notification as read.

| Field   | Type       | Description
|---------|------------|----------
| accessToken | String| Access token obtained from the OAuth authentication.
| commands| Array      | Array of Command object. Each command will be processed in the specified order.
|commands.uuid| String | API clients should generate a unique string ID for each command and specify it in the uuid field. The Command UUID will be used for two purposes: 1.Command result mapping: Each command’s result will be stored in the sync_status field of the response JSON object. The sync_status object has its key mapped to a command’s uuid and its value containing the result of a command.2.Command idempotency: Todoist will not execute command that has same UUID as the previously executed commands. This will allow clients to safely retry each command without accidentally performing the command twice.
| commands.id| Number      | 	The id of the notification.

## Todoist.markAllAsRead
Mark all notifications as read.

| Field   | Type       | Description
|---------|------------|----------
| accessToken | String| Access token obtained from the OAuth authentication.
| commands| Array      | Array of Command object. Each command will be processed in the specified order.
|commands.uuid| String | API clients should generate a unique string ID for each command and specify it in the uuid field. The Command UUID will be used for two purposes: 1.Command result mapping: Each command’s result will be stored in the sync_status field of the response JSON object. The sync_status object has its key mapped to a command’s uuid and its value containing the result of a command.2.Command idempotency: Todoist will not execute command that has same UUID as the previously executed commands. This will allow clients to safely retry each command without accidentally performing the command twice.

## Todoist.markAsUnread
Mark the notification as unread.

| Field   | Type       | Description
|---------|------------|----------
| accessToken | String| Access token obtained from the OAuth authentication.
| commands| Array      | Array of Command object. Each command will be processed in the specified order.
|commands.uuid| String | API clients should generate a unique string ID for each command and specify it in the uuid field. The Command UUID will be used for two purposes: 1.Command result mapping: Each command’s result will be stored in the sync_status field of the response JSON object. The sync_status object has its key mapped to a command’s uuid and its value containing the result of a command.2.Command idempotency: Todoist will not execute command that has same UUID as the previously executed commands. This will allow clients to safely retry each command without accidentally performing the command twice.
| commands.id| Number      | 	The id of the notification.

## Todoist.sendInvitation
This function allows you to send invitation to your business account. Every invitation object has an unique id and secret code.

| Field    | Type       | Description
|----------|------------|----------
| accessToken | String| Access token obtained from the OAuth authentication.
| emailList| List       | The emails of users which will be invited.
| message  | String     | Additional text which will be included to invitation welcome message.

## Todoist.acceptBusinessInvitation
This function allows you to send invitation to your business account. Every invitation object has an unique id and secret code.

| Field   | Type       | Description
|---------|------------|----------
| accessToken | String| Access token obtained from the OAuth authentication.
| id      | Number     | The invitation id (a number).
| secret  | String     | The secret fetched from the live notification (a string value).

## Todoist.rejectBusinessInvitation
The invitation is rejected and deleted. Note that the client doesn’t have to provide the user’s token to reject invitation: it’s enough to provide knowledge of invitation secret business account yet.

| Field       | Type       | Description
|-------------|------------|----------
| accessToken | String| Access token obtained from the OAuth authentication.
| invitationId| Number     | The invitation id (a number).
| secret      | String     | The secret fetched from the live notification (a string value).

## Todoist.getActivityLogs
Get activity logs.Is only available for Todoist Premium.

| Field           | Type       | Description
|-----------------|------------|----------
| accessToken | String| Access token obtained from the OAuth authentication.
| objectType      | String     | Filters events by a specific object type.
| objectId        | Number     | Filters events by a specific object id, but only if the objectType has been also specified.
| eventType       | String     | Filters events by a specific event type.
| objectEventTypes| String     | An alternative way to filter by multiple object and event types. This takes a list of strings of the form [object_type]:[event_type] (where either object_type part or the event_type part can be omitted), such as for example [`item:`, `note:added`]. When this parameter is specified the object_type, event_type and object_id parameters are ignored.
| parentProjectId | Number     | Filters object events by the id of the project they belong to, so this implicitly limits the results to items and notes.
| parentItemId    | Number     | Filters object events by the id of the project they belong to, so this implicitly limits the results to items and notes.
| initiatorId     | Number     | Filters event by the id of the initiator.
| since           | DatePicker | Return items with a completed date newer than since (a string value formatted as 2007-4-29T10:13).
| until           | DatePicker | Return items with a completed date same or older than until (a string value formatted as 2007-4-29T10:13).
| limit           | Number     | The number of events to return, where the default is 30, and the maximum is 100.
| offset          | Number     | The number of events to skip, which can be used for pagination in order to get more events than those returned by the previous call.

## Todoist.getBackups
Todoist creates a backup archive of users’ data on a daily basis. Backup archives can also be accessed from the web app (Todoist Settings -> Backups).

| Field   | Type       | Description
|---------|------------|----------
| accessToken | String| Access token obtained from the OAuth authentication.

## Todoist.createObjectEmail
Creates a new email address for an object.

| Field   | Type       | Description
|---------|------------|----------
| accessToken | String| Access token obtained from the OAuth authentication.
| objType | Select     | The object’s type.
| objId   | Number     | The object’s id.

## Todoist.getObjectEmail
Gets an existing email.

| Field   | Type       | Description
|---------|------------|----------
| accessToken | String| Access token obtained from the OAuth authentication.
| objType | Select     | The object’s type.Options - project, project_comments or item.
| objId   | Number     | The object’s id.

## Todoist.disableObjectEmail
Disables an email address for an object.

| Field   | Type       | Description
|---------|------------|----------
| accessToken | String| Access token obtained from the OAuth authentication.
| objType | Select     | The object’s type.Options - project, project_comments or item.
| objId   | Number     | The object’s id.

## Todoist.getUploadsFiles
Get all user’s uploads.

| Field   | Type       | Description
|---------|------------|----------
| accessToken | String| Access token obtained from the OAuth authentication.
| limit   | Number     | The number of items to return (a number, where the default is 30, and the maximum is 50).
| lastId  | Number     | Can be used for pagination. This should be the minimum upload id you’ve fetched so far. All results will be listed before that id.

## Todoist.deleteExistingUser
Delete an existing user

| Field          | Type       | Description
|----------------|------------|----------
| accessToken | String| Access token obtained from the OAuth authentication.
| currentPassword| String    | 	The user’s current password.
| reasonForDelete| String     | A reason for deletion, that is used for sending feedback back to Todoist.

## Todoist.createMultipleCommand
Create request with multiple command. See more about multiple commands [here](https://developer.todoist.com/sync/v7/#sync)

| Field          | Type       | Description
|----------------|------------|----------
| accessToken | String| Access token obtained from the OAuth authentication.
| commands | JSON    | 	Array of Command object. Each command will be processed in the specified order.
