# Установка: 
1. 

    cd vagrant/config
    cp vagrant-local.example.yml vagrant-local.yml
    cd ../..

2. 
    Запишите свой токен для Github в ./vagrant/config/vagrant-local.yml

3. vagrant up
4.  

    ssh vagrant 
    cd /app
    composer install
    .yii migrate
  
   (Provision в вагранте с этими командами падает, не успеваю разобраться. Поэтому такой геморрой)
   
5. php init

# Комментарии

-  бэкенд доступен по http://site/backend/ (работает варинат только со слешем на конце)
-  фронтенд достпуен по http://site/
-  на фронте успел  сверстать страничку с формой и новостями, остальные пустые
-  маска для телефона не реализована, так как неуспел разобратсья с регулярками (на бэке реализовать было легко через виджет, на фронте не разобрался как сделать, а модель общая , то не работает нигде теперь)
- гугл капча тоже в беке была реализована, а во фронте не успеваю. Теперь там только ее внешний вид,а по сути не работает
- табличка на бэке с формами плывет по длине

## Оправдания

- много времени и моральных сил ушло на конфигурирование advanced шаблона ( так как по требованию фронтенд и бекэнд отдельно), особоенно при переносе их на один домен (пляски с nginx и конфигами urlManager)
- вышеперечисленные проблемы безусловно решил бы, но не успеваю. Поэтому сдаю так кривенько и с верстокой кривой, так как было мало практики.

