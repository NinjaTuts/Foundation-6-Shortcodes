# Work in Progress

## Foundation 6 Shortcodes for WordPress

## Requirements
The plugin is tested with `Foundation 6` and `WordPress 4.4`

## Shortcode Reference

## Usage

### Grid
```
[row]
	[col small="6"]...[/col]
    [col medium="6"]...[/col]
    [col large="6"]...[/col]
[/row]
```

#### [row] parameters

| Attribute				| Description																					| Required	| Values							| Default		|
| :-------------:	| :-------------------------------------------------: | :-------: | :-----------------:	| :-------: |
| id      				| An ID you wish to add 															|   no 	   	|  any id							|  null   	|
| class         	| Any classes you wish to add      										|   no     	|  any class/classes	|  null   	|
| style						| Any inline styles you wish to add      							|   no     	|  any css properties |  null   	|
| fluid						| Full width row (refer Foundation documentation)   	|   no     	|  yes   							|  null   	|

#### [col] parameters

| Attribute				| Description																					| Required	| Values							| Default		|
| :-------------:	| :-------------------------------------------------: | :-------: | :-----------------:	| :-------: |
| id      				| An ID you wish to add 															|   no 	   	|  any id							|  null   	|
| class         	| Any classes you wish to add      										|   no     	|  any class/classes	|  null   	|
| style						| Any inline styles you wish to add      							|   no     	|  any css properties |  null   	|
| small						| Column size on small screens      									|   no     	|  1-12  							|  null   	|
| medium					| Column size on medium screens    										|   no     	|  1-12  							|  null   	|
| large						| Column size on large screens      									|   no     	|  1-12  							|  null   	|
| small_centered	| Center the column on small screen or not						|   no     	|  yes, no 						|  null   	|
| medium_centered	| Center the column on medium screen or not						|   no     	|  yes, no 						|  null   	|
| large_centered	| Center the column on large screen or not						|   no     	|  yes, no 						|  null   	|


#### [subheader] parameters

| Attribute				| Description																					| Required	| Values							| Default		|
| :-------------:	| :-------------------------------------------------: | :-------: | :-----------------:	| :-------: |
| id      				| An ID you wish to add 															|   no 	   	|  any id							|  null   	|
| class         	| Any classes you wish to add      										|   no     	|  any class/classes	|  null   	|
| style						| Any inline styles you wish to add      							|   no     	|  any css properties |  null   	|
| type						| Heading Type h1-h6     															|   no     	|   1-6    						|  null   	|


#### [lead] parameters

| Attribute				| Description																					| Required	| Values							| Default		|
| :-------------:	| :-------------------------------------------------: | :-------: | :-----------------:	| :-------: |
| id      				| An ID you wish to add 															|   no 	   	|  any id							|  null   	|
| class         	| Any classes you wish to add      										|   no     	|  any class/classes	|  null   	|
| style						| Any inline styles you wish to add      							|   no     	|  any css properties |  null   	|