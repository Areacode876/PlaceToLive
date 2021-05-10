import pymysql

class placetolive(object):
    def __init__(self):
        self.db = pymysql.connect(host = 'db-databases.chuy0fvfnt0x.us-east-2.rds.amazonaws.com', user='root',password = 'mysqlroot',port = 3306, db = 'placetolive')
        self.cursor = self.db.cursor()
    
    def execute_sql(self,sql):
        self.cursor.execute(sql)
        # for temp in self.cursor.fetchall():
            # print(temp)

    def createtable(self):
        # sql = 'create table customer_type( TypeID TINYINT unsigned primary key, Type_Name varchar(20))'
        # self.execute_sql(sql)
        # sql = 'create table property_type( PTypeID INT unsigned primary key, Type_Name varchar(100))'
        # self.execute_sql(sql)
        # sql = 'create table property( PropertyID INT unsigned primary key not null auto_increment, PTypeID INT unsigned, Location varchar(1000), Price decimal(10,3) unsigned, Features varchar(500), Year year, foreign key (PTypeID) references property_type (PTypeID))'
        # self.execute_sql(sql) 
        # sql = 'create table customer_information(UserID INT unsigned primary key not null auto_increment, First_Name varchar(30) not null, Last_Name varchar(30) not null, Gender ENUM(\'Male\',\'Female\',\'Secret\') , Contact char(10),Email_Address varchar(100))'
        # self.execute_sql(sql)
        # sql = 'create table user_login(UserID INT unsigned primary key not null, User_Name varchar(50), Hashed_Password char(128), Email_Address varchar(100), foreign key (UserID) references customer_information (UserID))'
        # self.execute_sql(sql)
        # sql = 'create table user_save(UserID INT unsigned primary key not null, PropertyID INT unsigned not null, foreign key (UserID) references customer_information (UserID), foreign key (PropertyID) references property (PropertyID))'
        # self.execute_sql(sql)
        pass
    
    def submit(self):
        self.db.commit()

    def insert_sql(self):
        # sql = "insert into customer_type\
        #     (TypeID,Type_Name)\
        #         values(%s,'%s')"%\
        #             (1,'Buyer')
                
        # self.execute_sql(sql)
        # self.submit()
        # sql = "insert into customer_type\
        #     (TypeID,Type_Name)\
        #         values(%s,'%s')"%\
        #             (2,'Seller')
        # self.execute_sql(sql)
        # self.submit()
        # sql = "insert into customer_type\
        #     (TypeID,Type_Name)\
        #         values(%s,'%s')"%\
        #             (3,'Renter')
        # self.execute_sql(sql)
        # self.submit()
        # sql = "insert into customer_type\
        #     (TypeID,Type_Name)\
        #         values(%s,'%s')"%\
        #             (4,'Realtor')
        # self.execute_sql(sql)
        # self.submit()
        pass
if __name__ == "__main__":
    ptl = placetolive()
    ptl.createtable()
    # ptl.insert_sql()
    
