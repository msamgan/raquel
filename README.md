# raquel

laravel package to handle Raw MySQL Queries and stored procedure like a charm

# installation

```injectablephp
composer require msamgan/raquel
```

# Usage

## Make a new query

```injectablephp
php artisan make:query QueryFileName
```

the above command will create a query in the directory ***storage/app/queries***

PS: Nested Directories are acceptable in the command

## Accessing the Query Response at runtime

```injectablephp
getQueryData('QueryFileName', ['param1' => 'value', 'param2' => 'value'])
```

### Example

```injectablephp
php artisan make:query AdminUsers
```

the above command will add query to **storage/app/queries/AdminUsers.sql**

update the query file as per your requirements, say
```sql
select user.id, user.name where user.admin_id = adminId
```

call will look like

```injectablephp
getQueryData('AdminUsers', ['adminId' => 2])
```

## Accessing the Query at runtime

```injectablephp
getQuery('AdminUsers', ['adminId' => 2])
```

the above function will return the raw query like,

```sql
select user.id, user.name where user.admin_id = 2
```

## Future Scope

#### - Application with Stored Procedures

