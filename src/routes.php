<?php
$routes = [
    'metadata',
    'getAccessToken', // 1
    'revokeAccessToken',//1
    'exchangeApiToken',//1
    'crossOriginResourceSharing', // 1
    'readResources', // 1
    'createProject', //1
    'updateProject', //1
    'deleteProject', // 1
    'archiveProject', // 1
    'unarchiveProject', // 1
    'updateMultipleOrdersAndIndents', //1
    'createItem', //1
    'updateItem', // 1
    'deleteItem', //1
    'moveItem', //1
    'completeItems', //1
    'uncompleteItems', //1
    'completeRecurringTask', //1
    'closeItem', //1
    'updateDayOrders', //1
    'createLabel', //1
    'updateLabel', //1
    'deleteLabel', //1
    'updateMultipleOrders', // 1
    'createNote', //1
    'createProjectNote', // 1
    'updateNote', //1
    'deleteNote', //1
    'createFilter', //1
    'updateFilter', //1
    'deleteFilter', //1
    'createReminder', //1
    'updateReminder', //1
    'deleteReminder', //1
    'clearLocations', //1
    'getProductivityStats', //1
    'getAllCompletedItems', // 1
    'getArchivedProjects', //1
    'getItemInfo', //1
    'getProjectInfo', //1
    'getProjectData', //1
    'quickAddTask', //1
    'registerNewUser', //1
    'updateUsersProperties', //1
    'updateKarmaGoals', // unavailable
    'updateNotificationSettings', //dont work
    'shareProject', // 1
    'deleteCollaborator', // 1
    'acceptInvitation', //1
    'rejectInvitation', // 1
    'deleteInvitation', // 1
    'setLastKnown', // 1
    'markAsRead', // 1
    'markAllAsRead', // 1
    'markAsUnread', // 1
    'sendInvitation', // 1
    'acceptBusinessInvitation', // 1
    'rejectBusinessInvitation', // 1
    'getActivityLogs', // 1
    'getBackups', // 1
    'createObjectEmail',//1
    'getObjectEmail', // 1
    'disableObjectEmail', // 1
    'getUploadsFiles', //1
    'deleteExistingUser', // 1
    'webhookEvent'
];
foreach($routes as $file) {
    require __DIR__ . '/../src/routes/'.$file.'.php';
}
