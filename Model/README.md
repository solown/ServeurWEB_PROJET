######################################## GDPR UPDATE 1 @ : ylgn ######################################## 

1) data_crypter.php

ouverture des fichiers key & vector pour le hash open_SSL 
ils se trouvent dans le fichier caché .key
encrypt($data) encrypte une chaine de caractère
decrypt($data) decrypte une chaine de caractère

2) get_student appel de encrypt lors du bindValue avant requete avec les email
appel de decrypt lors de l'appel constructeur du user
appel de decrypt lors du bindValue après requete

3) register-student.php appel de encrypt lors du bindValue sur firstname & mail
