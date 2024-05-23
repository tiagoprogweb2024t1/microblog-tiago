# Operações CRUD

## Resumo

- C: CREATE (INSERT)    -> inserir dados
- R: READ (SELECT)      -> ler/carregar dados
- U: UPDATE (UPDATE)    -> atualizar dados
- D: DELETE (DELETE)    -> excluir dados

## Exemplos

### INSERT na tabela de usuários

```sql
INSERT INTO usuarios (nome, email, senha, tipo) 
VALUES ('Tiago', 'tiago@gmail.com', '123senac', 'admin');
```

```sql
INSERT INTO usuarios (nome, email, senha, tipo) 
VALUES ('Fulano', 'fulano@hotmail.com', 'senac789', 'editor');
```

```sql
INSERT INTO usuarios (nome, email, senha, tipo) 
VALUES ('Chaves', 'chaves@gmail.com', '123456', 'editor');
```

