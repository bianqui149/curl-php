# CURL MANUAL

Manual script to run excel file via curl.

## Minimum Requirements

Composer 2+

PHP 7.4

## Installation

Clone the repository to your local environment and then execute:

```bash
composer install
```

## Usage

```python
# copy the excel file in the root folder
cp ~/HOME/curl.xlsx ./

# create an env file with environment variables, use the env.example file and place with the correct values
cp .env.example .env

# run from your command line terminal, this will generate 2 txt files with the success and failure data
php init.php

```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](https://choosealicense.com/licenses/mit/)