# Prof Server
## Mini-Prof Server Side API
## To Do
Valid Session put on PUSH Server  
~~Join Session~~  
~~Start Session~~  
~~LecID to current Session ID~~  
~~getALLSessions from LecID~~  
~~endSession~~  
# API Documentation
On Campus:   
`http://sccug-mini-prof.lancs.ac.uk/ProfServer/ `  

Off Campus:   
`http://wilsonator.co.uk/MiniProf/ `   

## Authentication

###### GET `/Auth/LecID/`
Gets the LecturerID

###### Parameters

| Key      | Required | Description |
|----------|----------|-------------|
|          |          |             |

###### POST `/Auth/Login/`
Used for loging in as a lecturer and getting a token

###### Parameters

| Key      | Required | Description |
|----------|----------|-------------|
| NAME     | Yes      | A Username  |
| PASSWORD | Yes      | A Password  |

###### POST `/Auth/Register/`
Used for registering a User.

###### Parameters

| Key      | Required | Description                 |
|----------|----------|-----------------------------|
| NAME     | Yes      | A Username for the new user |
| UNI      | Yes      | University of the user      |
| PASSWORD | Yes      | A Password for the new user |

## Poll

###### GET `/Poll/`
Gets the Information of a Poll
###### Parameters

| Key      | Required | Description  |
|----------|----------|--------------|
| ID       | Yes      | ID of a Poll |

###### POST `/Poll/`
Submit a response for a Poll
###### Parameters

| Key      | Required | Description                           |
|----------|----------|---------------------------------------|
| ID       | Yes      | ID of a Poll                          |
| VOTE     | Yes      | Vote can ONLY be "A", "B", "C" or "D" |

###### POST `/Poll/Create/`
Create a Poll
###### Parameters

| Key      | Required | Description                           |
|----------|----------|---------------------------------------|
| SESSIONID| Yes      | ID of a Session                       |

## Review

###### GET `/Review/`
Gets all the Reviews for a Session
###### Parameters

| Key       | Required | Description     |
|-----------|----------|-----------------|
| SESSIONID | Yes      | ID of a Session |
###### POST `/Review/`
Sends a Review for a Session
###### Parameters

| Key       | Required | Description        |
|-----------|----------|--------------------|
| REVIEW    | Yes      | Text of the Review |
| SESSIONID | Yes      | ID of a Session    |
## Sessions
###### POST `/Sessions/endSession/`
Ends the Session
###### Parameters

| Key       | Required | Description        |
|-----------|----------|--------------------|
| SESSIONID | Yes      | ID of a Session    |

###### GET `/Sessions/getALLSessions/`
Gets all the Sessions from the User
###### Parameters

| Key       | Required | Description        |
|-----------|----------|--------------------|
| | | |                                     |

###### GET `/Sessions/getCurrentSession/`
Gets the current Session hosted by Lecture with ID
###### Parameters

| Key       | Required | Description        |
|-----------|----------|--------------------|
| LECID     | Yes      | ID of a Lecturer   |

###### POST `/Sessions/joinSession/`
Increments participants on a Session
###### Parameters

| Key       | Required | Description        |
|-----------|----------|--------------------|
| SESSIONID | Yes      | ID of a Session    |

###### POST `/Sessions/startSession/`
Starts a Session returns the SessionID
###### Parameters

| Key       | Required | Description                                             |
|-----------|----------|---------------------------------------------------------|
| NAME      | No       | Name Of the Session (Defaults to current Date and Time) |

## TLS (Speed Monitor or Traffic Light System)
###### GET `/TLS/`
Gets the Information of a TLS
###### Parameters

| Key      | Required | Description  |
|----------|----------|--------------|
| ID       | Yes      | ID of a Poll |

###### POST `/TLS/`
Submit a response for a TLS
###### Parameters

| Key       | Required | Description                                             |
|-----------|----------|---------------------------------------------------------|
| SESSIONID | Yes      | ID of a Session                                         |
| MINUTE    | Yes      | Minute of the Session submitted in (May Be Depreciated) |
| OPTION    | Yes      | Option can ONLY be "Slow", "Fast" or "NH"               |
