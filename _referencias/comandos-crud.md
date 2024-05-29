# Operações CRUD

## Resumo

- C: CREATE (INSERT)    -> inserir dados
- R: READ (SELECT)      -> ler/carregar dados
- U: UPDATE (UPDATE)    -> atualizar dados
- D: DELETE (DELETE)    -> excluir dados

## Exemplos para tabela de usuários

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

### SELECT na tabela de usuários

```sql
SELECT nome, email FROM usuarios;
```

```sql
SELECT nome, email FROM usuarios WHERE tipo = 'admin';
```

```sql
SELECT * FROM usuarios WHERE id > 1;
```

### UPDATE na tabela de usuários

```sql
UPDATE usuarios SET tipo = 'editor'
WHERE id = 1;

-- Obs.: NUNCA esqueça de passar pelo menos uma condição 
-- para o UPDATE! 
```

### DELETE na tabela de usuários

```sql
DELETE FROM usuarios WHERE id = 2;

-- Obs.: NUNCA esqueça de passar pelo menos uma condição 
-- para o DELETE! 
```

---
## Exercícios

1) Insira mais 2 usuários com quaisquer dados. Deixe um como `admin` e outro como `editor`.

```sql
INSERT INTO usuarios(nome, email, senha, tipo)
VALUES('Jon', 'jon@teste.com', '123456', 'admin');

INSERT INTO usuarios(nome, email, senha, tipo)
VALUES('Janis', 'janis@music.com', 'abcdef', 'editor');
```

2) Em uma nova consulta SQL, mostre os `id`, `nome` e `tipo` de todos os usuários atuais.

```sql
SELECT id, nome, tipo FROM usuarios;
```
---

## Exemplos para tabela de notícias

### Inserir notícias

```sql
INSERT INTO noticias(titulo, texto, resumo, imagem, usuario_id)
VALUES(
    'Meu pai ganhou na mega-sena',
    'Jogou bons números e bla bla bla',
    'Vai pegar o prêmio',
    'premio.jpg',
    1
);

INSERT INTO noticias(titulo, texto, resumo, imagem, usuario_id)
VALUES(
    'Corinthians é o melhor time',
    'Mentiraaaa',
    'Tá feia a situação',
    'corinthians.jpg',
    3
);

INSERT INTO noticias(titulo, texto, resumo, imagem, usuario_id)
VALUES(
    'VSCode agora suporta IA',
    'A Microsoft lançou uma nova versão do VSCode',
    'Suporte nativo ao Copilot',
    'vscode.png',
    1
);
```

### Select em notícias

```sql
SELECT titulo, data FROM noticias;
```

```sql
SELECT titulo, data FROM noticias ORDER BY data DESC;
-- Usamos o ORBER BY data DESC para classificar em ordem 
-- decrescente pela data
```

### SELECT com JOIN (consulta com junção de tabelas)

**Objetivo:** realizar uma consulta que mostre a data e o título da notícia **e** o nome do autor da notícia.

```sql
-- Selecionando as colunas indicando as tabelas em que estão
SELECT
  noticias.data,
  noticias.titulo,
  usuarios.nome

-- Especificamos as tabelas que serão "juntadas/combinadas"
FROM noticias JOIN usuarios

-- Critério da junção/relação entre as tabelas
-- Usamos as referências de FK e PK
ON noticias.usuario_id = usuarios.id;
```








