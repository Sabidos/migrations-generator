<?php

namespace Sabidos\MigrationsGenerator\Syntax;

class ListSchemasFunction
{
    /**
     * Get string for dropping a table
     *
     * @param      $tableName
     * @param null $connection
     *
     * @return string
     */
    public function listSchemasFunction($tableName, $connection = null)
    {
        $output = "public function listSchemas()"
    ."{"
        ."\$schemas = DB::table('pg_catalog.pg_namespace')"
            ."->select('nspname as schemas')"
            ."->whereNotIn('nspname', ['pg_catalog','public','pg_toast', 'pg_temp_1', 'pg_toast_temp_1','information_schema', 'log', 'catalogo'])"
            .">orderBy('schemas')"
            ."->get();"
        ."return \$schemas;."
    ."}";
        return $output;
    }
}
