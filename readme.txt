1,数据库用户密码加解密方式
INSERT INTO users (name,password,register) VALUES ('cl',AES_ENCRYPT('1233210','key'),NOW()) 
SELECT username,PASSWORD,AES_DECRYPT(testpswd,'key') FROM users