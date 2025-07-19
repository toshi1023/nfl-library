# Work Instructions
- I want to create a CRUD feature for players table data in the admin panel, so please implement the corresponding CRUD API for this purpose.

## Purpose
- To connect players table data for the admin panel side.

## Requirements
1. Implement API processing for routing defined as `Route::resource('/players', 'PlayerController');`
2. Structure should have business logic in Service classes and query logic in Repository classes.
3. For validation and Response structure, create custom Request classes and Resource classes respectively, and describe the logic there.
4. All classes mentioned in the structure should be aggregated under the Admin folder as parent. Create a new Admin folder if it doesn't exist.
5. Generate Unit tests and Feature tests for success and failure patterns corresponding to the created API processing.
6. All Unit tests and Feature tests must pass. If tests do not pass, fix the implementation until they do.

## Constraints
- Service classes and Repository classes must implement interfaces.
- Use Resource classes to format API responses. (Response should return all table columns.)
- Controller Response should be unified by referring to `App\Http\Controllers\Api\Mobile\SearchController`.
- When creating classes, refer to existing classes in the Mobile folder and follow parent class inheritance and interface implementation rules.
- Interface service container resolution should be described in the AppServiceProvider class.

## Additional Instructions
- Check the players table structure in advance and understand column information by referring to migration files or Model files.
- Implement proper error handling and return appropriate HTTP status codes and error messages.
- Clarify the implementation details of each CRUD method (index, show, store, update, destroy).
- Properly configure dependency injection in DI container (ServiceProvider, etc.).
- Unify API response format (structure for both success and error cases).

## File Structure Example
app/
├── Http/
│   ├── Controllers/
│   │   └── Api/
│   │       └── Admin/
│   │           └── PlayerController.php
│   ├── Requests/
│   │   └── Admin/
│   │       └── Player/
│   │           ├── StorePlayerRequest.php
│   │           └── UpdatePlayerRequest.php
│   └── Resources/
│       └── Admin/
│           └── Player/
│               └── PlayerResource.php
├── Services/
│   └── Admin/
│       └── Player/
│           ├── PlayerService.php
│           └── PlayerServiceInterface.php
├── Repositories/
│   └── Admin/
│       └── Player/
│           ├── PlayerRepository.php
│           └── PlayerRepositoryInterface.php
└── Providers/
└── AppServiceProvider.php
tests/
├── Feature/
│   └── Admin/
│       └── PlayerControllerTest.php
└── Unit/
    └── Admin/
        ├── PlayerServiceTest.php
        └── PlayerRepositoryTest.php

## Reference Information
- Follow existing project structure and coding conventions
- Adhere to Laravel best practices