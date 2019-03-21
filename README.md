# Product variants

### DB data (saved variants)
id | variant
--- | ---
1  | Green, 128GB
2  | Green, 256GB
3  | Red, 128GB
4  | Red, 256GB

### CASE1: add variants Memory 2GB
All products have id, so all need to be update.
id | variant
--- | ---
1 | Green, 128 GB, 2GB
2 | Green, 256 GB, 2GB
3 | Red, 128 GB, 2GB
4 | Red, 256 GB, 2GB

### CASE2: add variants storage 512GB
Products with id = 0 are new and need to be created, others updated.
id | variant
1 | Green, 128GB, 2GB
2 | Green, 256GB, 2GB
0 | Green, 512GB, 2GB
3 | Red, 128GB, 2GB
4 | Red, 256GB, 2GB
0 | Red, 512GB, 2GB

### CASE3: add variants Memory 2GB, 4GB 
Products with id = 0 are new and need to be created, others updated.
id | variant
--- | ---
1 | Green, 128GB, 2GB
2 | Green, 256GB, 2GB
3 | Red, 128GB, 2GB
4 | Red, 256GB, 2GB

0 | Green, 128GB, 4GB
0 | Green, 256GB, 4GB
0 | Red, 128GB, 4GB
0 | Red, 256GB, 4GB