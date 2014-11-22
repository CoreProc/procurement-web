## ProcEx

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/CoreProc/procurement-web/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/CoreProc/procurement-web/?branch=master) [![Build Status](https://scrutinizer-ci.com/g/CoreProc/procurement-web/badges/build.png?b=master)](https://scrutinizer-ci.com/g/CoreProc/procurement-web/build-status/master) 

[ProcEx (Procurement Explorer)](https://procex.coreproc.ph) is the most awesome way to browse and analyze PHILGEPS data on bids and stuff.  

## WEB API 

ProcEx API base url is **/api**
 
### GET /search

Base URL for search

#### GET {item}

Fetch a specific bid item.

https://procex.coreproc.ph/api/search/item/816783

#### GET query

Fetch a collection of bid items from specific parameters

* **classifications[]** - array[string] 
* **areas[]** - array[string] 
* **categories[]** - array[string] 
* **year** - string (optional)

https://procex.coreproc.ph/api/search/query?areas[]=Abra&areas[]=Metro Manila&year=2006

#### GET from-location

Fetch collection of bid items from province

* **province** - string
* **year** - string (optional) 

https://procex.coreproc.ph/api/search/from-location?province=Abra&year=2009

### GET /areas

Fetch list of Areas

https://procex.coreproc.ph/api/areas

### GET /classifications

Fetch list of Classifications

https://procex.coreproc.ph/api/classifications

### GET /categories

Fetch list of Categories

https://procex.coreproc.ph/api/categories

### GET /notice-types

Fetch list of Notice Types

https://procex.coreproc.ph/api/notice-types

### GET /utility

Base URL for utilities

#### POST lookup-province

Lookup your province based on lat-long data

* string **lat**
* string **long**

## SMS

Access the ProcEx API from your GSM phone by texting the keyword INFO to **21589393** and replying YES.

### Keywords

All keywords are prefixed with the string **PROCEX**

#### HELP

Get quick help on keywords and stuff.

#### INQUIRE

Inquire about the summary of information on bids at your location
 
```
PROCEX INQUIRE
```

#### SEARCH

Get a summary of bids using specialty keywords and filters

##### CLASSIFICATION

Get the complete list of classification names [here](https://procex.coreproc.ph/api/classifications)

Syntax

```
PROCEX SEARCH CLASSIFICATION <NAME> <YEAR [optional]>
```

Example

```
PROCEX SEARCH CLASSIFICATION GOODS 2009
```

##### AREA

Get the complete list of areas [here](https://procex.coreproc.ph/api/areas)

Syntax

```
PROCEX SEARCH AREA <NAME> <YEAR [optional]>
```

Example

```
PROCEX SEARCH AREA CAVITE 2003
```

##### CATEGORY

Get the complete list of category names [here](https://procex.coreproc.ph/api/categories)

Syntax
```
PROCEX SEARCH CATEGORY <NAME> <YEAR [optional]>
```

Example
```
PROCEX SEARCH CATEGORY AGRICULTURE 
```


## License

ProcEx is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
