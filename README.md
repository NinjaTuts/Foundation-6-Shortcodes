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

| Attribute     | Description   | Required | Values | Default |
| :-----------: |:-------------:| :-------:|:------:| :------:|
| id      			| right-aligned |   no 	   |        |  null   |
| class         | centered      |   no     |        |  null   |
| style					| are neat      |   no     |        |  null   |
| fluid					| are neat      |   no     |  yes   |  null   |

#### [col] parameters

| Attribute     	| Description   | Required | Values 	| Default |
| :-----------: 	|:-------------:| :-------:|:------:	| :------:|
| id      				| right-aligned |   no 	   |        	|  null   |
| class         	| centered      |   no     |        	|  null   |
| style						| are neat      |   no     |        	|  null   |
| small						| are neat      |   no     |  1-12  	|  null   |
| medium					| are neat      |   no     |  1-12  	|  null   |
| large						| are neat      |   no     |  1-12  	|  null   |
| small_centered	| are neat      |   no     | yes, no  |  null   |
| medium_centered	| are neat      |   no     | yes, no  |  null   |
| large_centered	| are neat      |   no     | yes, no  |  null   |


#### [subheader] parameters

| Attribute     	| Description   | Required | Values 	| Default |
| :-----------: 	|:-------------:| :-------:|:------:	| :------:|
| id      				| right-aligned |   no 	   |        	|  null   |
| class         	| centered      |   no     |        	|  null   |
| style						| are neat      |   no     |        	|  null   |
| type						| are neat      |   no     |   1-6    |  null   |


#### [lead] parameters

| Attribute     	| Description   | Required | Values 	| Default |
| :-----------: 	|:-------------:| :-------:|:------:	| :------:|
| id      				| right-aligned |   no 	   |        	|  null   |
| class         	| centered      |   no     |        	|  null   |
| style						| are neat      |   no     |        	|  null   |