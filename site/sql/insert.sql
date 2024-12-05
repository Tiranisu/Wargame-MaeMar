-- Add Users
INSERT INTO "user" (username, password, is_admin) VALUES
    ('admin', 'KakouKakou123', TRUE)

-- Add Product
INSERT INTO product (product_name, description, photo, review) VALUES
    ('Firewall ProSecure X1', 'Une solution de pare-feu avancée avec protection contre les attaques réseau.', 'http://admin.cybertrust.com/images/firewall.jpg', 'Excellente performance et interface utilisateur intuitive.'),
    ('Antivirus ShieldMax 2024', 'Une suite antivirus complète offrant une détection avancée des malwares.', 'http://admin.cybertrust.com/images/antivirus.jpg', 'Très efficace, mais consomme un peu trop de ressources système.'),
    ('VPN SecureLink Ultra', 'Service VPN avec chiffrement de bout en bout et connexion rapide.', 'http://admin.cybertrust.com/images/vpn.jpg', 'Connexion stable et bon choix de serveurs, mais prix légèrement élevé.'),
    ('Password Manager SafePass', 'Un gestionnaire de mots de passe avec chiffrement AES 256 bits.', 'http://admin.cybertrust.com/images/manager.jpg', NULL);

