CREATE OR REPLACE VIEW v_programme AS SELECT
    cfp_id,
    formation_id,
    nom_formation,
    id_module,
    nom_module,
    reference,
    (prix) prix_module,
    (duree) duree_module,
    (programmes.id) id_programme,
    (programmes.titre) titre_programme,
    prerequis,
    objectif,
    modalite_formation
FROM
    (
    SELECT
        (modules.id) id_module,
        modules.reference,
        modules.nom_module,
        formations.domaine_id,
        formations.cfp_id,
        formation_id,
        formations.nom_formation,
        prix,
        duree,
        prerequis,
        objectif,
        modalite_formation
    FROM
        modules,
        formations
    WHERE
        modules.formation_id = formations.id
) AS module
JOIN programmes ON module.id_module = programmes.module_id;



CREATE OR REPLACE VIEW v_exportcatalogue AS SELECT
    modules.reference,
    modules.nom_module,
    modules.prerequis,
    modules.objectif,
    modules.modalite_formation,
    prix,
    duree,
    formations.nom_formation,
    domaine_id,
    cfp_id,
    nom_domaine
FROM
    modules,
    formations,
    domaines
WHERE
    modules.formation_id = formations.id AND domaine_id = domaines.id;



CREATE OR REPLACE VIEW v_exportresponsable AS SELECT
    nom_resp,
    prenom_resp,
    fonction_resp,
    email_resp,
    telephone_resp,
    nom_etp,
    adresse,
    email_etp,
    telephone_etp
FROM
    responsables,
    entreprises,secteurs
WHERE
    entreprises.id = responsables.entreprise_id and secteur_id = secteurs.id;


create or replace view v_exportparticipant as
    select
    s.matricule,
    s.nom_stagiaire,
    s.prenom_stagiaire,
    s.fonction_stagiaire,
    s.genre_stagiaire,
    s.mail_stagiaire,
    s.telephone_stagiaire,
    nom_etp,
    entreprises.adresse,
    email_etp,
    telephone_etp
    from
        stagiaires s,entreprises,secteurs where entreprises.id = s.entreprise_id and secteur_id = secteurs.id;

