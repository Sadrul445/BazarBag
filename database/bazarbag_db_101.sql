BEGIN TRANSACTION;
DROP TABLE IF EXISTS "migrations";
CREATE TABLE IF NOT EXISTS "migrations" (
	"id"	integer NOT NULL,
	"migration"	varchar NOT NULL,
	"batch"	integer NOT NULL,
	PRIMARY KEY("id" AUTOINCREMENT)
);
DROP TABLE IF EXISTS "users";
CREATE TABLE IF NOT EXISTS "users" (
	"id"	integer NOT NULL,
	"name"	varchar NOT NULL,
	"email"	varchar NOT NULL,
	"email_verified_at"	datetime,
	"password"	varchar NOT NULL,
	"remember_token"	varchar,
	"created_at"	datetime,
	"updated_at"	datetime,
	PRIMARY KEY("id" AUTOINCREMENT)
);
DROP TABLE IF EXISTS "password_reset_tokens";
CREATE TABLE IF NOT EXISTS "password_reset_tokens" (
	"email"	varchar NOT NULL,
	"token"	varchar NOT NULL,
	"created_at"	datetime,
	PRIMARY KEY("email")
);
DROP TABLE IF EXISTS "failed_jobs";
CREATE TABLE IF NOT EXISTS "failed_jobs" (
	"id"	integer NOT NULL,
	"uuid"	varchar NOT NULL,
	"connection"	text NOT NULL,
	"queue"	text NOT NULL,
	"payload"	text NOT NULL,
	"exception"	text NOT NULL,
	"failed_at"	datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY("id" AUTOINCREMENT)
);
DROP TABLE IF EXISTS "personal_access_tokens";
CREATE TABLE IF NOT EXISTS "personal_access_tokens" (
	"id"	integer NOT NULL,
	"tokenable_type"	varchar NOT NULL,
	"tokenable_id"	integer NOT NULL,
	"name"	varchar NOT NULL,
	"token"	varchar NOT NULL,
	"abilities"	text,
	"last_used_at"	datetime,
	"expires_at"	datetime,
	"created_at"	datetime,
	"updated_at"	datetime,
	PRIMARY KEY("id" AUTOINCREMENT)
);
DROP TABLE IF EXISTS "shops";
CREATE TABLE IF NOT EXISTS "shops" (
	"id"	integer NOT NULL,
	"product_name"	varchar NOT NULL,
	"product_description"	text NOT NULL,
	"image"	varchar NOT NULL,
	"other_images"	varchar,
	"price"	integer NOT NULL,
	"quantity"	integer,
	"created_at"	datetime,
	"updated_at"	datetime,
	PRIMARY KEY("id" AUTOINCREMENT)
);
INSERT INTO "migrations" ("id","migration","batch") VALUES (1,'2014_10_12_000000_create_users_table',1),
 (2,'2014_10_12_100000_create_password_reset_tokens_table',1),
 (3,'2019_08_19_000000_create_failed_jobs_table',1),
 (4,'2019_12_14_000001_create_personal_access_tokens_table',1),
 (5,'2024_01_03_083621_create_shops_table',1);
INSERT INTO "users" ("id","name","email","email_verified_at","password","remember_token","created_at","updated_at") VALUES (1,'mayaz','mayaz@gmail.com',NULL,'$2y$12$tYO6wZUThPEpkx8NpMYe7OMMM08SJcv10300miEh5K0wa4qxNoIbi',NULL,'2024-01-23 15:06:58','2024-01-23 15:06:58');
INSERT INTO "shops" ("id","product_name","product_description","image","other_images","price","quantity","created_at","updated_at") VALUES (1,'CODE Iridium Body Perfume 120ml','Lorem Ipsum dummy','https://codegrooming.com/cdn/shop/products/wild-stone-code-iridium-body-perfume.jpg?v=1652251805',NULL,550,1,'',NULL),
 (2,'CODE Titanium Body Perfume 120ml','TITANIUM is the embodiment of refined elegance. Its fragrance, characterized by a delightful blend of woody and marine notes, transcends mere scent, delivering an experience that is both invigorating and captivating. It effortlessly harmonizes vibrant, dynamic, and playful notes with an underlying sense ','https://codegrooming.com/cdn/shop/products/wild-stone-code-titanium-body-perfume.jpg?v=1652255315',NULL,550,1,NULL,NULL),
 (3,'CODE Steel Body Perfume 120 ml','STEEL exudes cosmopolitan sophistication with an aromatic aquatic scent. Its top notes of bergamot, neroli and lime create a refreshing and invigorating opening. The heart notes of rosemary, nutmeg and jasmine add a touch of elegance, evoking a soothing and serene ambiance. Finally, the base notes of moss, cedarwood & patchouli provide a grounding and comforting foundation. Perfect for formal and executive settings, STEEL enhances your pro','https://codegrooming.com/cdn/shop/products/wild-stone-code-steel-body-perfume_6803f7eb-eec0-4c4b-a4f3-259224fe1e64.jpg?v=1652254925',NULL,550,1,NULL,NULL),
 (4,'CODE Copper Body Perfume 120ml','COPPER is a citrus ambery fragrance that infuses vitality and radiance in any glamorous outing. Opening with top notes of armoise, pineapple & lemon, it creates a zesty outset, setting the stage for a lively experience. As the fragrance unfolds, heart notes of violet, apple & labdanum add colourful depth, illuminating the atmosphere. Finally, base notes of amber and patchouli leave a lasting im','https://codegrooming.com/cdn/shop/products/wild-stone-code-copper-body-perfume_f4fa7b21-d670-4abb-8694-b79da34ddfd0.jpg?v=1652254260',NULL,550,1,NULL,NULL),
 (5,'The Ordinary Multi-Peptide Serum for Hair Density 60ml','The Ordinary Multi-Peptide Serum for Hair Density 60ml','https://theordinary.com/dw/image/v2/BFKJ_PRD/on/demandware.static/-/Sites-deciem-master/default/dw16fde0e0/Images/products/The%20Ordinary/rdn-multi-peptide-serum-for-hair-density-60ml.png?sw=1200&sh=1200&sm=fit',NULL,3490,1,NULL,NULL),
 (6,'The Ordinary Glyconic Acid7% Toning Sol. PH3.6 240ml','Glycolic Acid is an alpha hydroxy acid that exfoliates the skin. This 7% toning solution offers mild exfoliation for improved skin radiance and visible clarity. The formula also improves the appearance of skin texture with continued use.

This formula contains a studied Tasmanian Pepperberry derivative. This derivative is of plant origin and varies in colour seasonally and this colour variation may be apparent in the formula from time to time. The formula is further supported with inclusion of ginseng root and aloe vera for both visible radiance and skin soothing benefits.','https://m.media-amazon.com/images/I/316NEqzIRmL._SX300_SY300_QL70_FMwebp_.jpg',NULL,2740,1,NULL,NULL),
 (7,'The Ordinary Niacinamide 10% + Zinc 1% 30ml','Our Niacinamide 10% + Zinc 1% formula is a water-based serum that boosts skin brightness, improves skin smoothness and reinforces the skin barrier over time. It contains a high 10% concentration of Niacinamide (vitamin b3) and zinc PCA.

Note: Niacinamide and Zinc PCA is not a treatment for acne. For persistent acne-related conditions, we recommend speaking to your health care provider regarding treatment options. This formulation can be used alongside acne treatments if desired for added visible skin benefits.','https://theordinary.com/dw/image/v2/BFKJ_PRD/on/demandware.static/-/Sites-deciem-master/default/dw632d2597/Images/products/The%20Ordinary/rdn-niacinamide-10pct-zinc-1pct-30ml.png?sw=1200&sh=1200&sm=fit',NULL,1980,1,NULL,NULL),
 (8,'The Ordinary Hyaluronic Acid 2% + B5 30ml','Hyaluronic Acid 2% + B5 is a water-based formula combining low-, medium- and high-molecular-weight hyaluronic acid molecules and a next-generation HA crosspolymer to support hydration to multiple layers of your skin. It also targets the appearance of wrinkles and textural irregularities. Plus, it uses pro-vitamin B5 to enhance hydration at the outer layers, resulting in smoother, plumper skin.','https://theordinary.com/dw/image/v2/BFKJ_PRD/on/demandware.static/-/Sites-deciem-master/default/dw23dff902/Images/products/The%20Ordinary/rdn-hyaluronic-acid-2pct-b5-30ml.png?sw=1200&sh=1200&sm=fit',NULL,1750,1,NULL,NULL),
 (9,'The Ordinary caffeine solution 5% + EGCG 30ml','Caffeine Solution 5% + EGCG is a water-based serum that reduces the look of puffiness and dark circles in the eye contour. The formula works by combining a high concentration of caffeine with a highly-purified epigallocatechin gallatyl glucoside (EGCG).','https://theordinary.com/dw/image/v2/BFKJ_PRD/on/demandware.static/-/Sites-deciem-master/default/dwbdf2d919/Images/products/The%20Ordinary/rdn-caffeine-solution-5pct-egcg-30ml.png?sw=1200&sh=1200&sm=fit',NULL,1810,1,NULL,NULL),
 (10,'The Ordinary AHA 30% + BHA 2% Peeling Solution 30ml','AHA 30% + BHA 2% Peeling Solution exfoliates multiple layers of the skin for a brighter, more even appearance. With the help of alpha-hydroxy acids (AHA), beta-hydroxy acids (BHA), and a studied Tasmanian pepperberry derivative, which reduces irritation that can be associated with acid use, this at-home peel helps even skin texture, clear pore congestion, and improve uneven pigmentation. The formula is further supported with a crosspolymer form of hyaluronic acid for comfort, pro-vitamin B5 for hydration, and black carrot for added protection.

Note: This formula contains an extremely high concentration of free acids. We recommend use only if you are an experienced user of acid exfoliation and your skin is not sensitive.

The pH of this formula is approximately 3.6. Glycolic Acid, the primary AHA used in the formula, has a pKa of 3.6 and pKa is the most important aspect to consider in formulating with acids. pKa implies acid availability. When pKa is close to pH, there is an ideal balance between salt and acidity, maximizing the effectiveness of the acid and reducing skin discomfort.','https://theordinary.com/dw/image/v2/BFKJ_PRD/on/demandware.static/-/Sites-deciem-master/default/dwa98551aa/Images/products/The%20Ordinary/rdn-aha-30pct-bha-2pct-peeling-solution-30ml.png?sw=1200&sh=1200&sm=fit',NULL,1770,1,NULL,NULL);
DROP INDEX IF EXISTS "users_email_unique";
CREATE UNIQUE INDEX IF NOT EXISTS "users_email_unique" ON "users" (
	"email"
);
DROP INDEX IF EXISTS "failed_jobs_uuid_unique";
CREATE UNIQUE INDEX IF NOT EXISTS "failed_jobs_uuid_unique" ON "failed_jobs" (
	"uuid"
);
DROP INDEX IF EXISTS "personal_access_tokens_tokenable_type_tokenable_id_index";
CREATE INDEX IF NOT EXISTS "personal_access_tokens_tokenable_type_tokenable_id_index" ON "personal_access_tokens" (
	"tokenable_type",
	"tokenable_id"
);
DROP INDEX IF EXISTS "personal_access_tokens_token_unique";
CREATE UNIQUE INDEX IF NOT EXISTS "personal_access_tokens_token_unique" ON "personal_access_tokens" (
	"token"
);
COMMIT;
