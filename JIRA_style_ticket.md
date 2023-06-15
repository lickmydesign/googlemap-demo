
# Requirements as a JIRA Style ticket format

As a *Site Visitor* I wish to see a large map and be able to record my points of interest on it. Upon navigating away and returning my POIs should be retained and displayed.

### Implementation Details

- Obtain Google Map API Key [...]
- Laravel project
- nosql / postgres db
- home page with large embedded Google Map (loads any POIs from DB, zero on current location / Wiltshire?)
- button '+ Add a POI' (save/autosave? & reload) 
- tests (home page loads, POI is saved, POI is loaded)

DB Table:

```
-----------------------------
| points_of_interest	      |
-----------------------------
| id INT(11) AI PK          |
| name VARCHAR(55), UN, NN  |
| x DECIMAL(10, 7),	NN	    |
| y DECIMAL(10, 7),	NN	    |
| (+ auto timing fields)    |
-----------------------------
```

### Testing

- Open the url, confirm map loads
- click the 'Add POI' button confirm it is created and saved
- refresh the page, confirm it still shows
- close the browser, re-visit - confirm POI still shows

### Acceptance Criteria

GIVEN I am a *Site Visitor*<br>
WHEN I add a POI to the map<br>
THEN it is recorded and visible on subsequent visits

GIVEN I am a *SysAdmin*<br>
WHEN I query the database<br>
THEN I can determine POIs for visitors of the site
